<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class MainController extends Controller
{

	private $images;

	public function __construct(ImageService $imageService)
	{
		$this->images = $imageService;
	}

	public function profile() 
	{	
		$images	= $this->images->all();

		return view('profile', ['imageInView' => $images]);
	}

	public function editprofile(Request $request)
	{
		$image = $request->file('image');

		$this->images->add($image);

		return redirect('/profile');
	}




	public function show($id)
	{
		$myImage = $this->images->one($id);

		return view('show', ['imageInView' => $myImage->img]);
	}


	public function edit($id)
	{
		$image = $this->images->one($id);

		return view('edit', ['imageInView' => $image]);
	}


	public function update(Request $request, $id)
	{
		$this->images->update($id, $request->image);

	    return redirect('/profile');
	}



	public function delete($id)
	{
		$this->images->delete($id);

		return redirect('/profile');
	}
}
