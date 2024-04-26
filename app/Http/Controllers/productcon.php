<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table_product_model;
use Mail;
use App\Mail\email;

use App\Mail\SendMessageToEndUser;
use Illuminate\Support\Facades\Storage;

class productcon extends Controller
{
    function shop() 
     {
       
            $product=table_product_model::all();
        return view('shop')->with('product',$product);
        }
        
       function search(Request $request)  {
        $data=$request['search'];
        
       
           $product=table_product_table::where('Title','like','%'.$data.'%')->orwhere('Price','like','%'.$data.'%')->orwhere('Size','like','%'.$data.'%')->get();
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

 function mailData(Request $request)
	{
		$data=request()->validate([
'name'=>'required',
'email'=>'required|email',
'message'=>'required',

        ]);

        Mail::to('ritikk217648@gmail.com')->send(new email($data));
        return view('Thanks');
	}


}
