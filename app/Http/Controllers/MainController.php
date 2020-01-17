<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
	public function profile() 
	{
		$images = DB::table('test')->select('*')->get();
		$myImages = $images->all();
	    return view('profile', ['imageInView' => $myImages]);
	}

	public function editprofile(Request $request)
	{
		$image = $request->file('image');
		$filename = $request->image->store('img');
			
		DB::table('test')->insert([
		    ['img' => $filename]
		]);

		return redirect('/profile');
	}

	public function show($id)
	{
		$image = DB::table('test')->select('*')->where('id', $id)->first();
		$myImage = $image->img;
		return view('show', ['imageInView' => $myImage]);
	}

	public function edit($id)
	{
		$image = DB::table('test')->select('*')->where('id', $id)->first();	
		return view('edit', ['imageInView' => $image]);
	}

	public function update(Request $request, $id)
	{
		//удаляем картинку с сервера
		$image = DB::table('test')->select('*')->where('id', $id)->first();	

		Storage::delete($image->img);

		$filename = $request->image->store('img');
		
		DB::table('test')
		->where('id', $id)
	    ->update(['img' => $filename]);

	    return redirect('/profile');
	}

	public function delete($id)
	{
		//удаляем картинку с сервера
		$image = DB::table('test')->select('*')->where('id', $id)->first();	

		Storage::delete($image->img);

		DB::table('test')->where('id', $id)->delete();

		return redirect('/profile');
	}
}
