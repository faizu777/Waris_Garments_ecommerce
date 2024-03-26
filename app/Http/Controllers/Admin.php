<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table_Admin;
use App\Models\table_product_model;
use Illuminate\Support\Facades\Storage;
class Admin extends Controller
{

    function LoginView(){
        $error="no";
        return view('Adminloginview')->with('error',$error);
    }
    function Login(Request $info)
    {
        $model=new table_Admin();
      $email=$model::where('Email',$info['email'])->first();
      $pass=$model::where('Password',$info['password'])->first();
    
      if (!is_null($email)&& !is_null($pass)) {
       $productdata=table_product_model::all();
        return view('Adminpanel')->with('productdata',$productdata);
      }
      else {
        $error="yes";

        return view('Adminloginview')->with('error',$error);
      }
      
      

    }
    function Add_product(Request $products) {
        $productmodel=new table_product_model();
       $product= $products->validate([
'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg,JPG',
'product_name'=>'required',
'product_size'=>'required',
'product_price'=>'required',

        ]);
     
        $imageName =time(). '.' . $products->image->extension();

        
        $productmodel->Title=$product['product_name'];
        $productmodel->Img=$imageName;
        $productmodel->Size=$product['product_size'];
        $productmodel->Price=$product['product_price'];
        $productmodel->save();
        
        $products->image->move(public_path('Storage'), $imageName);
        return back();
    }

    function Update(Request $update , $id)
    {
      $newdata=table_product_model::where('id',$id)->first();
      $product= $update->validate([
    'image'=>'image',
        'product_name'=>'required',
        'product_size'=>'required',
        'product_price'=>'required',
        
                ]);
             if (array_key_exists('image',$product))
              {
                $imagePath = public_path('/Storage/' .$newdata->Img);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
            
               
            } else {
                echo "Image does not exist.";
            }
             // $data=  Storage::delete($file_path);


              $imageName =time().'.' . $update->image->extension();
              $newdata->Img=$imageName;
              $newdata->Title=$product['product_name'];
             
              $newdata->Size=$product['product_size'];
              $newdata->Price=$product['product_price'];
           
              
              $update->image->move(public_path('Storage'), $imageName);
            } else {
              
              $newdata->Title=$product['product_name'];
             
              $newdata->Size=$product['product_size'];
              $newdata->Price=$product['product_price'];
             }
             $newdata->save();
                
      
    }
    function Delete($id)
    {
$Deltedata=table_product_model::where('id',$id)->first();

      $imagePath = public_path('/Storage/' .$Deltedata->Img);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
            
               
            } else {
                echo "Image does not exist.";
            }
            $Deltedata->delete();
            $productdata=table_product_model::all();
            return view('Adminpanel')->with('productdata',$productdata);
    }

function Addview()  {
  
  return view('Addproduct');
}

}
