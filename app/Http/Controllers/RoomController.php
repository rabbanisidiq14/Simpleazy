<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Room_admin;
use App\Temp_rooms;
use Auth;

class RoomController extends Controller
{
    public function index()
    {

    }

    public function show_room($id_user, $id_room)
    {
        //Hapus session role
        session()->forget('admin');
        session()->forget('member');

        //Query data
        $data_room['member'] = DB::table('temp_rooms')->join('room_admins','temp_rooms.id_room','=','room_admins.id_room')->join('users','temp_rooms.id_user','=','users.id')->where('room_admins.id_room',$id_room)->get();
        $data_room['admin'] = DB::table('room_admins')->join('users','room_admins.id_user','=','users.id')->where('room_admins.id_room',$id_room)->get();
        $data_room['nama_room'] = DB::table('room_admins')->select('nama_room')->where('id_room',$id_room)->get();
        $data_room['id_room'] = $id_room;
        $data_room['kas'] = DB::table('table_kas')->where('id_room',$id_room)->where('id_user',$id_user)->get();
        $check_member_exists = DB::table('room_admins')->where('id_user',$id_user)->where('id_room',$id_room)->first();
        if ($check_member_exists) {
            session()->put('admin','admin');
            return view('/room/rooms', $data_room);
        }else{
            session()->put('member','member');
            return view('room/rooms',$data_room);
        }
        
    }

    public function create_room()
    {
    	return view('/room/create_room');
    }

    public function process(Request $request)
    {
        //Validasi
        $rules = [
            'nama_room' => 'required|string',
            'foto'      => 'required|image|mimes:jpeg,jpg,png,svg'
        ];
        $this->validate($request,$rules);
        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);
        //Insert Database
    	$nama_room = $request->nama_room;
    	$id_user = $request->id_user;
    	$make_id_room = Str::random(10);
    	$status = Room_admin::insert([
    		'id_room' => $make_id_room,
    		'id_user' => $id_user,
    		'nama_room' => $nama_room,
            'foto' => $imageName
    	]);
        if ($status) {
            return redirect('/home')->with('success','Room Berhasil Dibuat');
        }else{
            return redirect('/create_room')->with('error','Tidak dapat membuat room');    
        }
    	
    }

    public function join_room()
    {
    	return view('/room/join_room');
    }

    public function join_process(Request $request)
    {
    	$id_room = $request->id_room;
    	$id_user = $request->id_user;
        $rules = [
            'id_user' => 'required',
            'id_room' => 'required|string'
        ];
        $this->validate($request,$rules);

        //Query join
        $check_member_exists = Temp_rooms::where('id_room','=',$id_room)->where('id_user','=',$id_user)->first();
        $check_admin_not_member = Room_admin::where('id_room','=',$id_room)->where('id_user','=',$id_user)->first();

        if (!empty($check_admin_not_member)) {
            return redirect('/join_room')->with('a_exists','Anda admin ruangan ini!');
        }else{
            if (!empty($check_member_exists)) {
                return redirect('/join_room')->with('m_exists','Kamu sudah berada diruangan ini!');
            }else{
                $check_room_exists = DB::table('room_admins')->where('id_room',$id_room)->first();
                if ($check_room_exists) {
                    DB::table('temp_rooms')->insert([
                        'id_room' => $id_room,
                        'id_user' => $id_user
                    ]);    
                }else{
                    return redirect('/join_room')->with('error','Token ruangan tidak sesuai');
                }
                
            return redirect('/home');
            }
        }      
    	
    }

    public function edit_room($ia,$ir)
    {
        if ($ia == Auth::user()->id && session('admin') == 'admin') {
            $data_room['old_value'] = DB::table('room_admins')->where('id_room',$ir)->where('id_user',$ia)->get();
            $data_room['admin'] = $ia;
            $data_room['id_room'] = $ir;
            return view('room/edit_room',$data_room);
        }else{
            return redirect('/r/'.$ia.'/'.$ir)->with('danger','Access Denied!');
        }
    }

    public function edit_process(Request $request)
    {
        if (session('admin') == 'admin') {
            $rules = [
                'nama_room' => 'required|string',
            ];
            $this->validate($request,$rules);
            $nama_room = $request->nama_room;
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $ir = $request->id_room;
            $ia = $request->id_user;
            $status = DB::table('room_admins')->where('id_room',$ir)->update([
                'id_room' => $ir,
                'id_user' => $ia,
                'nama_room' => $nama_room,
                'foto' => $imageName

            ]);
            if ($status) {
                return redirect('/r/'.$ia.'/'.$ir)->with('update','Edit berhasil!');
            }else{
                echo "Error";
            }
        }else{
            echo "Access Denied";
        }
    }

    public function member_info($im,$ir)
    {
        $data_member['member'] = DB::table('temp_rooms')->join('users','users.id','=','temp_rooms.id_user')->where('id_user',$im)->where('id_room',$ir)->get();
        if (\Session::has('admin')) {
            return view('/member/members',$data_member);
        }else{
            return redirect('/r/'.$im.'/'.$ir);
        }
    }    
}
