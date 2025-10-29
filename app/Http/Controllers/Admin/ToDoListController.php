<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use App\Http\Controllers\Controller;

class ToDoListController extends Controller
{
    public function add(Request $request)  {
        $data          = new ToDoList;
        $data->text    = $request->text;
        $data->date    = $request->date;
        if (auth()->user()) {
            $data->user_id = auth()->user()->id;
        }
        if (auth()->guard('agent')->user()) {
            $data->agent_id = auth()->guard('agent')->id();
        }
        if ($request->agent_id) {
            $data->agent_id = $request->agent_id;
        }
        $data->save();
        return view('admin.to_lists.li',[
                        'item'=>$data
                    ]);
    }
    public function add_row(Request $request) {
        $data          = new ToDoList;
        $data->text    = $request->text;
        $data->date    = $request->date;
        if (auth()->user()) {
            $data->user_id = auth()->user()->id;
        }
        if (auth()->guard('agent')->user()) {
            $data->agent_id = auth()->guard('agent')->id();
        }
        if ($request->agent_id) {
            $data->agent_id = $request->agent_id;
        }
        $data->save();
        return view('admin.to_do_lists.tr_unit',[
                        'data'=>$data
                    ]);
    }
    public function update_status($id,Request $request)  {
        $data = ToDoList::find($id);
        $data->status = $request->status;
        $data->save();
    }
    public function update_order(Request $request) {
        $orderData = $request->order; 
        foreach ($orderData as $index => $item) {
            \App\Models\ToDoList::where('id', $item['id'])
                ->update(['order' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }
    public function index()  {
        $agents  = \App\Services\AgentService::items();
        $allData = ToDoList::OrderBy('order','asc')->OrderBy('date','asc')->where(function($query){
                                if (auth()->guard('agent')->check()) {
                                    $query->where('agent_id',auth()->guard('agent')->id());
                                }else{
                                    $query->where('user_id',auth()->user()->id);
                                }
                                if (request()->agent_id) {
                                    $query->where('agent_id',request()->agent_id);
                                }
                                if (request()->date_from) {
                                    $query->where('date','>=',request()->date_from);
                                }
                                if (request()->date_to) {
                                    $query->where('date','<=',request()->date_to);
                                }
                            })->paginate(20);
        if (request()->ajax()) {
           return view('admin.to_do_lists.table',[
                    'allData' => $allData,
                 ])->render();
        }
        return view('admin.to_do_lists.index',[
                    'allData' => $allData,
                    'title'   => 'To Do List',
                    'agents'  =>  $agents
                 ]);
    }
    public function edit($id)  {
        $data = ToDoList::find($id);
        $agents  = \App\Services\AgentService::items();
        return view('admin.to_do_lists.edit',[
                    'data'=>$data,
                    'agents'=>$agents
                ]);
    }
    public function post_edit(Request $request,$id) {
        $data = ToDoList::find($id);
        $data->text    = $request->text;
        $data->date    = $request->date;
        $data->agent_id = $request->agent_id;
        $data->save();
        return view('admin.to_do_lists.tr_unit',[
                        'data'=>$data
                    ]);
    }
    public function delete($id)  {
        $data = ToDoList::find($id);
        if ($data) {
            $data->delete();
        }
        return back()
                ->with('yes','Done Successfully');
    }
}
