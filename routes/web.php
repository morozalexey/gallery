<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/login', function (){
	return view('login');
});

Route::get('/registration', function (){
	return view('registration');
});

Route::get('/profile', function () {
	$images = DB::table('test')->select('*')->get();
	$myImages = $images->pluck('img')->all();
    return view('profile', ['imagesInView' => $myImages]);
});

Route::post('/store', function(Request $request){
	$image = $request->file('image');
	//$filename = ;
	dd($request->image->store('img'));
		
	DB::table('test')->insert([
	    ['img' => $filename]
	]);

	return redirect('/profile');
});
