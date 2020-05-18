<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send_mail(Request $request)
    {
    	$data['email'] = $request->email;
    	return view('/kas/form_tagih',$data);
    }

    public function send_process(Request $request)
    {


    	$subject = $request->subject;
    	$content = $request->content;
    	$emailBody = "<p>Hello World <b>NONONO</b><p/>";

    	$emailContent = array(
    		'emailBody' => $emailBody
    	);

	     Mail::send('mail',['pesan' =>$request->pesan ], function($message) use ($request){
	       $message->subject($request->subject);
           $message->from('replyforcheck@gmail.com','Reply');
           $message->to($request->to);
	     });
	     return redirect('/home')->with('success','Berhasil Dikirim');
    }

}
