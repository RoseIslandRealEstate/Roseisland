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
}
