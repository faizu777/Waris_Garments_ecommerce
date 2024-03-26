<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcon;
use App\Http\Controllers\Admin;
Route::get('/', function () {
    return view('index');
});


Route::get('/shop', [productcon::class, 'shop']);
Route::get('/about', [productcon::class, 'About']);
Route::get('/contact', [productcon::class, 'Contact']);
Route::get('/Thanks', [productcon::class,'Thankspage']);
Route::post('/sendmail',[productcon::class,'sendmail']);
Route::post ('/send-mail',[productcon::class,'mailData'])->name('send_mail');
Route::get('/Blog', [productcon::class, 'blog']);
Route::post('/Addproduct', [Admin::class, 'Add_product']);
Route::any('/Login', [Admin::class, 'Login']);
Route::get('/admin', [Admin::class, 'LoginView']);
Route::post('/Update/{id}', [Admin::class,'Update']);
Route::any('/Delete/{id}', [Admin::class,'Delete']);
Route::get('/Addproduct', [Admin::class,'Addview']);



