<?php

namespace Modules\Leads\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Modules\Leads\App\Models\ToDoList;
class HomeController extends Controller
{
     public function index() {
        $my_list = ToDoList::OrderBy('order','asc')->OrderBy('date','asc')->where(function($query){
                                if (auth()->guard('agent')->check()) {
                                    $query->where('agent_id',auth()->guard('agent')->id());
                                }else{
                                    $query->where('user_id',auth()->user()->id);
                                }
                            })->take(30)->get();
        return view('admin.home',[
                        'my_list'=>$my_list,
                    ]);
    }
    public function login()  {
        return view('leads::admin.users.login');
    }
    public function post_login(Request $request)  {
       if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
           
            return redirect('agents')
                ->with('yes', 'Logged in successfully as user');

        } elseif (Auth::guard('agent')->attempt(['username' => $request->email, 'password' => $request->password], true)) {
            Auth::shouldUse('agent'); 
            return redirect('/')
                ->with('yes', 'Logged in successfully as agent');
        } else {
            return back()->with('no', 'Error in Email or Password');
        }

    }
    public function logout() {
       Auth::logout();
       Auth::guard('agent')->logout();
       return redirect('login')
                    ->with('yes','logged out successfully'); 
    }
}
