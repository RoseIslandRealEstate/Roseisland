<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadComment;
use Auth;
use App\Exports\LeadExport;
use Maatwebsite\Excel\Facades\Excel;
class LeadController extends Controller
{
    protected $platforms ;
    protected $projects;
    protected $agents;
    protected $types;
    protected $compaigns;
    protected $statuses;
    protected $portals;

    public function __construct()  {
        $this->platforms = \App\Services\General::platforms();
        $this->projects  = \App\Services\ProjectService::items();
        $this->agents    = \App\Services\AgentService::items();
        $this->types     = \App\Services\LeadService::types();
        $this->compaigns = \App\Services\CompaignService::items();
        $this->statuses  = \App\Services\LeadService::statuses();
        $this->portals   = \App\Services\LeadService::portals();
    }
    public function index() {
        if (request()->export == 1) {
            return  Excel::download(new LeadExport, 'leads.xlsx');
        }
        $allData  =  Lead::orderBy('date','desc')
                        ->where(function($query){
                            if (request()->name) {
                                $query->where('name','LIKE','%'.request()->name.'%');
                                $query->orwhere('phone','LIKE','%'.request()->name.'%');
                            }
                            if (auth()->guard('agent')->id()) {
                                $query->where('agent_id',auth()->guard('agent')->id());
                            }
                        })
                        ->where(function($query){
                            if (request()->lead) {
                                $query->where('agent_name','LIKE','%'.request()->lead.'%');
                                $query->orwhere('sno',request()->lead);
                                $query->orwhere('project_name','LIKE','%'.request()->lead.'%');
                                $query->orwhereHas('compaign',function($query){
                                    $query->where('name','LIKE','%'.request()->lead.'%');
                                });
                            }
                        })
                        ->where(function($query){
                            if (request()->status) {
                                $query->where('status',request()->status);
                            }
                            if (request()->platform) {
                                $query->where('platform',request()->platform);
                            }
                            if (request()->portal) {
                                $query->where('portal',request()->portal);
                            }
                            if (request()->date_from) {
                                $query->where('date','>=',request()->date_from);
                            }
                             if (request()->date_to) {
                                $query->where('date','<=',request()->date_to);
                            }
                        })->paginate(12);
        if (request()->ajax()) {
            return       view('admin.leads.table',[
                                'allData'   =>  $allData,
                                'title'     => 'leads',
                                'platforms' =>  $this->platforms,
                                'projects'  =>  $this->projects,
                                'agents'    =>  $this->agents   ,
                                'types'     =>  $this->types,
                                'compaigns' =>  $this->compaigns,
                                'statuses' =>  $this->statuses,
                                'portals' =>  $this->portals,
                            ])->render();
        }
        return     view('admin.leads.index',[
                        'allData'   =>  $allData,
                        'title'     => 'leads',
                        'platforms' =>  $this->platforms,
                        'projects'  =>  $this->projects,
                        'agents'    =>  $this->agents   ,
                        'types'     =>  $this->types,
                        'compaigns' =>  $this->compaigns,
                        'statuses' =>  $this->statuses,
                        'portals' =>  $this->portals,
                    ]);
    }
    public function add(Request $request)  {
         
            $data                 = new Lead;
            $data->name           = $request->name;
            $data->project_id     = $request->project_id;
            $data->platform       = $request->platform;
            // $data->sno            = $request->sno;
            $data->date           = $request->date;
            $data->phone          = $request->phone;
            $data->type           = $request->type;
            $data->portal         = $request->portal;
            $data->inquiry        = $request->inquiry;
            $data->agent_id       = $request->agent_id;
            $data->compaign_id    = $request->compaign_id;
            if (auth()->check()) {
                $data->user_id = 'admin_' . auth()->id();
            } elseif (auth()->guard('agent')->check()) {
                $data->user_id = 'agent_' . auth()->guard('agent')->id();
            }
            $data->save();
            $data->sno            = str_pad($data->id, 5, '0', STR_PAD_LEFT);
            $data->agent_name     = $data->agent?$data->agent->name:'';
            $data->project_name   = $data->project?$data->project->name:'';
            $data->save();
            $text = '<a  href="'.url('leads?lead='.$data->sno).'">You have new lead. SNO :'.$data->sno.'</a>';
              \App\Services\NotificationService::add_note($data->agent_id,null,$text);
            $tds =  view('admin.leads.tr_unit',[
                        'data'=>$data,
                        'platforms' =>  $this->platforms,
                        'projects'  =>  $this->projects,
                        'agents'    =>  $this->agents   ,
                        'types'     =>  $this->types,
                        'compaigns' =>  $this->compaigns,
                        'statuses'  =>  $this->statuses,
                        'portals' =>  $this->portals,
                    ])->render();
            return '<tr class="edit_loader_tr updated_row" data-id="'.$data->id.'">'.$tds.'</tr>';
    }
    public function delete($id){
        $data = Lead::find($id);
        if ($data) {
            $data->delete();
        }
        return back()
                ->with('yes','Deleted Successfully');
    }
    public function edit($id) {
        $data = Lead::find($id);
        return view('admin.leads.edit',[
                        'data'=>$data,
                        'platforms' =>  $this->platforms,
                        'projects'  =>  $this->projects,
                        'agents'    =>  $this->agents   ,
                        'types'     =>  $this->types,
                        'compaigns' =>  $this->compaigns,
                        'statuses'  =>  $this->statuses,
                        'portals' =>  $this->portals,
                    ])->render();
    }
    public function post_edit($id,Request $request)  {
        
        $data                 = Lead::find($id);
        $data->name           = $request->name;
        $data->project_id     = $request->project_id;
        $data->platform       = $request->platform;
        // $data->sno            = $request->sno;
        $data->date           = $request->date;
        $data->phone          = $request->phone;
        $data->type           = $request->type;
        $data->portal         = $request->portal;
        $data->inquiry        = $request->inquiry;
        $data->agent_id       = $request->agent_id;
        $data->compaign_id    = $request->compaign_id;
        $data->save();
        $data->agent_name     = $data->agent?$data->agent->name:$data->agent_name;
        $data->project_name   = $data->project?$data->project->name:$data->project_name;
        $data->save(); 
        return view('admin.leads.tr_unit',[
                        'data'=>$data,
                        'platforms' =>  $this->platforms,
                        'projects'  =>  $this->projects,
                        'agents'    =>  $this->agents   ,
                        'types'     =>  $this->types,
                        'compaigns' =>  $this->compaigns,
                        'statuses'  =>  $this->statuses,
                        'portals' =>  $this->portals,
                    ])->render();
    }
    public function update_status($id) {
        $data = Lead::find($id);
        return view('admin.leads.status',[
                    'data'     => $data,
                    'statuses' => $this->statuses,
                    'agents'   => $this->agents
                ]);
    }
    public function post_update_status(Request $request,$id)  {
        $data               = new LeadComment;
        $data->lead_id      = $id;
        $data->by           = 'Osama mohamed' ;
        $data->old_status   = $request->old_status;
        $data->status       = $request->status;
        $data->agent_id     = $request->agent_id??$request->old_agent_id;
        $data->old_agent_id = $request->old_agent_id;
        $data->text         = $request->text;
        $data->save();
        $lead               = Lead::find($id);
        $lead->status       = $data->status;
        $lead->agent_id     = $data->agent_id;
        $lead->agent_name     = $data->agent?$data->agent->name:$lead->agent_name;        
        $lead->save();

        return view('admin.leads.tr_unit',[
                        'data'=>$lead,
                        'platforms' =>  $this->platforms,
                        'projects'  =>  $this->projects,
                        'agents'    =>  $this->agents   ,
                        'types'     =>  $this->types,
                        'compaigns' =>  $this->compaigns,
                        'statuses'  =>  $this->statuses,
                        'portals' =>  $this->portals,
                    ])->render();
    }
    public function lead_statuses($id)  {
        $allData = LeadComment::OrderBy('id','desc')
                                ->where('lead_id',$id)->get();
        return     view('admin.leads.history',[
                            'allData'   => $allData,
                            'statuses'  => $this->statuses
                        ]);
    }
}
