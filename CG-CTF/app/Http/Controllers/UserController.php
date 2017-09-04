<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
class UserController extends Controller
{
    public function index(){
        return view('user.login');
    }
    public function login(Request $request){
        if(Auth::attempt(['name'=>$request->input('username'),'password'=>$request->input('password')])){
            return view('CG-CTF');
        }else{
            $data=[
                'error'=>'用户名或密码错误',
                'username'=>$request->input('username'),
                'password'=>$request->input('password'),
            ];
            return view('user.login',compact('data'));
        }

    }
    public function ProfileEdit(Request $userdata){
        if(Auth::check()){
            $id=Auth::id();
            return User::ProfileEdit($id,$userdata);
        }
        else return redirect()->route('login');
    }
    public function profile(){
        if(Auth::check()){
            $id=Auth::id();
            $userdata=User::find($id);
            return view('profile',['userdata'=>$userdata]);
        }
        else return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
        return view('CG-CTF');
    }
}
