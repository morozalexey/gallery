<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService
{
	public function all()
	{
		$images = DB::table('test')->select('*')->get();
		$myImages = $images->all();

		return $myImages;
	}

	public function add($image)
	{
		$filename = $image->store('img');
			
		DB::table('test')->insert([
		    ['img' => $filename]
		]);
	}

	public function one($id)
	{
		$image = DB::table('test')->select('*')->where('id', $id)->first();
		return $image;
	}

	public function update($id, $newImage)
	{
		//удаляем картинку с сервера
		$image = DB::table('test')->select('*')->where('id', $id)->first();	

		Storage::delete($image->img);

		$filename = $newImage->store('img');
		
		DB::table('test')
		->where('id', $id)
	    ->update(['img' => $filename]);
	}

	public function delete($id)
	{
		//удаляем картинку с сервера
		$image = $this->one($id);	

		Storage::delete($image->img);

		DB::table('test')->where('id', $id)->delete();
	}
}