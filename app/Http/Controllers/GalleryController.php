<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        return view('gallery.index');
    }


    public function create()
    {
        return view('gallery.create');
    }
}
