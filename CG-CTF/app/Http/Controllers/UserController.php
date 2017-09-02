<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function logout(){
        Auth::logout();
        return view('CG-CTF');
    }
}
