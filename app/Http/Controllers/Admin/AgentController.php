<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Agent;

class AgentController extends Controller
{
    public function index() {
        $allData = Agent::orderBy('id','asc')->get();
        return view('admin.agents.index',[
                        'allData'=> $allData,
                        'title'  => 'Agents'
                    ]);
    }
    public function add(Request $request)  {
            $request->validate([
                'username' =>  'required|unique:agents',
                'image'    =>  'image|mimes:jpg,png,jpeg,webp|max:1024'
            ]);
            $data           = new Agent;
            $data->name     = $request->name;
            $data->username = $request->username;
            $data->password = \Hash::make($request->password);
            if ($request->hasFile('image')) {
                $file        = $request->file('image');
                $filename    = 'uploads/agents/'.$request->username.'.jpg';
                $file->move('uploads/agents',$filename); 
                $data->image = $filename;
            }
            $data->save();
            return back()
                    ->with('yes','Added Successfully');
    }
    public function delete($id){
        $data = Agent::find($id);
        if ($data) {
            $data->delete();
        }
        return back()
                ->with('yes','Deleted Successfully');
    }
    public function edit($id) {
        $data = Agent::find($id);
        return view('admin.agents.edit',[
                        'data'=>$data
                    ])->render();
    }
    public function post_edit($id,Request $request)  {
        $request->validate([
            'username' => 'required|unique:agents,username,' . $id,
            'image'    =>  'image|mimes:jpg,png,jpeg,webp|max:1024'
        ]);

        $data = Agent::findOrFail($id);
        $data->name = $request->name;
        $data->username = $request->username;
        if ($request->filled('password')) {
            $data->password = \Hash::make($request->password);
        }
        if ($request->hasFile('image')) {
            $file        = $request->file('image');
            $filename    = 'uploads/agents/'.$request->username.'.jpg';
            $file->move('uploads/agents',$filename);
            $data->image = $filename;
        }
        $data->save();
        return back()->with('yes', 'Updated successfully');

    }
}
