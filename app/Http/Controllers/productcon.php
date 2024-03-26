<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table_product_model;
use Mail;
use App\Mail\SendMail;

use App\Mail\SendMessageToEndUser;
use Illuminate\Support\Facades\Storage;

class productcon extends Controller
{
    function shop()  {
        $product=table_product_model::all();
        return view('shop')->with('product',$product);
        
    }
    function About()
    {
        return view('about');
    }
    function Contact()
    {
        return view('contact');
    }
    
    function Admin()  {
        return view('Adminpanel');
        
    }
    function Thankspage()
    {
        return view('Thanks');
    }
function sendmail(Request $maildata)
{
    $body=$maildata;
    $name=$maildata['name'];
    $email=$maildata['email'];
    $message=$maildata['message'];
    Mail::send('email',['text' => $body], function($message) use ($email)
                    { $message->from($email, $name);
                        $message->sender($email, $name);
                        $message->to('faizu8803@gmail.com', 'faizan');
                        $message->subject($email);
                    });

}
public function mailData(Request $request)
	{
		$name = $request->name;
		$email = $request->email;
		$sub = $request->sub;
		$mess = $request->mess;
		
		$mailData = [
		'url' => 'https://sandroft.com/',
		];
		
		$send_mail = "test@gmail.com";
		
		Mail::to($send_mail)->send(new SendMail($name, $email, $sub, $mess));
		
		$senderMessage = "thanks for your message , we will reply you in later";
		Mail::to( $email)->send(new SendMessageToEndUser($name,$senderMessage,$mailData));
		
		return "Mail Send Successfully";
	}


}
