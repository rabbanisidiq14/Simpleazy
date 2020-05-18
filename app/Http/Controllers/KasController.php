<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasController extends Controller
{
    public function index()
    {
        
    }

    public function setting_kas($ia,$ir)
    {
        if (!session('admin')) {
            return redirect('/r/'.$im.'/'.$ir)->with('error','Access Denied!');
        }else{
            $data_room['id_user'] = $ia;
            $data_room['id_room'] = $ir;
            return view('kas/setting',$data_room);
        }
    }

    public function setting_process(Request $request)
    {
        if (session('admin') == 'admin') {
            $jumlah = $request->jumlah;
            $des = $request->deskripsi;
            $id_user = $request->id_user;
            $id_room = $request->id_room;
            $status = DB::table('kas_setting')->insert([
                'jumlah' => $jumlah,
                'deskripsi' => $des,
                'id_user' => $id_user,
                'id_room' => $id_room
            ]);

            if ($status) {
                    $kas['get_id'] = DB::table('kas_setting')->select('id_kas')->latest('waktu')->first();
                    if($kas)
                    {
                        $temp_var;
                        foreach ($kas as $k) {
                            $temp_var = $k->id_kas;
                        }
                        $room['select_member'] = DB::table('temp_rooms')->select('id_user')->where('id_room',$id_room)->get();
                        if ($room['select_member']) {
                            $def_stats = 'belum_dibayar';
                            foreach ($room['select_member'] as $r) {
                                DB::table('table_kas')->insert([
                                    'status' => $def_stats,
                                    'id_user' => $r->id_user,
                                    'id_room' => $id_room,
                                    'id_kas' => $temp_var
                                ]);
                            }
                        }
                    }
                }
                    return redirect('/r/'.$id_user.'/'.$id_room)->with('added','Pengumpulan Kas Ditambahkan!');
        }else{
            echo "Access Denied";
        }
    }

    public function form_bayar($iu, $ir, $ik)
    {
    	$data_bayar['id_user'] = $iu;
        $data_bayar['id_room'] = $ir;
        $data_bayar['id_kas'] = $ik;
    	return view('/kas/form_bayar', $data_bayar);
    }

    public function bayar_process(Request $request)
    {
    	$rules = [
    		'status' => 'required|string'
    	];
    	$this->validate($request, $rules);

    	$id_user = $request->id_user;
        $id_room = $request->id_room;
        $id_kas = $request->id_kas;
     	$status = $request->status;

    	try {
    		$query = DB::table('table_kas')->where('id_user',$id_user)->where('id_room',$id_room)->where('id_kas',$id_kas)->update([
    		    'status' => $status
    		]);
    		return redirect('/r/'.$id_user.'/'.$id_room);
    	} catch (Exception $e) {
    		echo $e;
    	}

    }

    public function lists($iu, $ir)
    {
        $all_task['task'] = DB::table('kas_setting')->where('id_room',$ir)->get();
        $all_task['id_user'] = $iu;
        $all_task['id_room'] = $ir;
        return view('/kas/list',$all_task);
    }

    public function details($iu, $ir,$ik)
    {
        $show_bb['status'] = DB::table('kas_setting')->join('table_kas','kas_setting.id_kas','=','table_kas.id_kas')->join('users','table_kas.id_user','=','users.id')->where('table_kas.id_room',$ir)->where('table_kas.id_kas',$ik)->get();
        $show_bb['id_room'] = $ir;
        return view('/kas/details',$show_bb);
    }
    
    public function stats($ia, $ir)
    {
        $stats['belum_bayar'] = DB::table('table_kas')->select('status')->where('status','belum_dibayar')->where('id_room',$ir)->count();
        $stats['dibayar'] = DB::table('table_kas')->select('status')->where('status','dibayar')->where('id_room',$ir)->count();
        $stats['id_admin'] = $ia;
        $stats['id_room'] = $ir;
        return view('kas/stats',$stats);
    }
}
