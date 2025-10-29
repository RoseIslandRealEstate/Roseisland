<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $allData = Project::orderBy('id','desc')->get();
        return view('admin.projects.index',[
                        'allData'=> $allData,
                        'title'  => 'projects'
                    ]);
    }
    public function add(Request $request)  {
            $request->validate([
                'name'=>'required|unique:projects'
            ]);
            $data           = new Project;
            $data->name     = $request->name;
            $data->save();
            return back()
                    ->with('yes','Added Successfully');
    }
    public function delete($id){
        $data = Project::find($id);
        if ($data) {
            $data->delete();
        }
        return back()
                ->with('yes','Deleted Successfully');
    }
    public function edit($id) {
        $data = Project::find($id);
        return view('admin.projects.edit',[
                        'data'=>$data
                    ])->render();
    }
    public function post_edit($id,Request $request)  {
        $request->validate([
            'name' => 'required|unique:projects,name,' . $id,
        ]);
        $data = Project::findOrFail($id);
        $data->name = $request->name;
        $data->save();
        return back()->with('yes', 'Updated successfully');

    }
}
