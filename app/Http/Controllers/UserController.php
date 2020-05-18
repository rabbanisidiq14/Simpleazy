<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index()
    {
    	if(!Session::get('login')) {
    		return view('login');
    	}else if(Session::get('login')){
    		return redirect('/');
    	}
    }

    public function login()
    {
    	return view('login');
    }

    public function process(Request $request)
    {
    	$username = $request->username;
    	$password = $request->password;
    	$data = DB::table('t_user')->where('username',$username)->first();
    	if ($data) {
    		$request->session()->put('username',$data->username);
    		$request->session()->put('login',TRUE);
    		return redirect('/');
    	}else{
    		echo "Login gagal";
    	}

    }

    public function logout()
    {
    	Session::flush();
    	echo 'Logout success';
    }
}
