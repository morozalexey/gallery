<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
	{
    	return view('homepage');
	}

	public function admin() 
	{
    	return view('admin');
	}

	public function login()
	{
		return view('login');
	}

	public function registration()
	{
		return view('registration');
	}
}
