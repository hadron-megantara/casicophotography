<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index(Request $request){
    	return view('galery');
    }
}
