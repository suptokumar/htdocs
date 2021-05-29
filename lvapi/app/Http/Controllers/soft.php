<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class soft extends Controller
{
    public function index()
    {
    	return view("index",['usertype'=>3]);
    }
}
