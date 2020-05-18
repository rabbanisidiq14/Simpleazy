<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Room;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session()->forget('admin');
        session()->forget('member');
        $get_id = Auth::user()->id;
        $rooms['owned_room'] = DB::table('room_admins')->select('*')->where('id_user','=',$get_id)->get();   
        $rooms['joined_room'] = DB::table('temp_rooms')->join('room_admins','temp_rooms.id_room','=','room_admins.id_room')->where('temp_rooms.id_user',$get_id)->get(); 
        return view('home', $rooms);
    }
}
