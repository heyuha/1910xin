<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
    public function index(){
    	return view("login.index");
    }
    public function logindo(){
    	$post = request()->except("_token");
    	$admin = Admin::where('a_name',$post['a_name'])->first();
    	// dd($admin);
    	if(decrypt($admin['a_pwd'])!=$post['a_pwd']){
    		return redirect('/login')->with('msg','用户名或密码不对！');
    	}
    	session(["adminInfo"=>$admin]);
    	return redirect("/");
    }
}
