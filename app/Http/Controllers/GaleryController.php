<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index(Request $request){
    	return view('galery');
    }

    public function indoor(Request $request){
    	return view('galeryindoor');
    }

    public function outdoor(Request $request){
    	return view('galeryoutdoor');
    }

    public function wedding(Request $request){
    	return view('galerywedding');
    }

    public function view(Request $request){
    	return view('galeryview');
    }

    public function object(Request $request){
    	return view('galeryobject');
    }
}
