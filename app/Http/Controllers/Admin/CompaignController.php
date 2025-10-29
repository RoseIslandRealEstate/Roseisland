<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compaign;

class CompaignController extends Controller
{
    protected $platforms ;
    protected $projects;
    public function __construct()  {
        $this->platforms = \App\Services\General::platforms();
        $this->projects  = \App\Services\ProjectService::items();
    }
    public function index() {
        $allData       = Compaign::orderBy('id','desc')->get();
        $formatted =  \App\Http\Resources\ComapignResource::collection($allData)->resolve();
        $formatted = collect($formatted)->map(function ($item) {
            return (object) $item;
        });
        return view('admin.compaigns.index',[
                        'allData'   =>  $formatted,
                        'title'     => 'compaigns',
                        'platforms' =>  $this->platforms,
                        'projects'  =>  $this->projects
                    ]);
    }
    public function add(Request $request)  {
            $request->validate([
                'name'=>'required|unique:compaigns'
            ]);
            $data                 = new Compaign;
            $data->name           = $request->name;
            $data->project_id     = $request->project_id;
            $data->platform       = $request->platform;
            $data->budget         = $request->budget;
            $data->start_date     = $request->start_date;
            $data->end_date       = $request->end_date;
            $data->save();
            return back()
                    ->with('yes','Added Successfully');
    }
    public function delete($id){
        $data = Compaign::find($id);
        if ($data) {
            $data->delete();
        }
        return back()
                ->with('yes','Deleted Successfully');
    }
    public function edit($id) {
        $data = Compaign::find($id);
        return view('admin.compaigns.edit',[
                        'data'=>$data,
                        'platforms' =>  $this->platforms,
                        'projects'  =>  $this->projects
                    ])->render();
    }
    public function post_edit($id,Request $request)  {
        $request->validate([
            'name' => 'required|unique:compaigns,name,' . $id,
        ]);
        $data = Compaign::findOrFail($id);
        $data->name           = $request->name;
        $data->project_id     = $request->project_id;
        $data->platform       = $request->platform;
        $data->budget         = $request->budget;
        $data->start_date     = $request->start_date;
        $data->end_date       = $request->end_date;
        $data->save();
        return back()->with('yes', 'Updated successfully');

    }
}
