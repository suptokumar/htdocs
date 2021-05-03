<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
class dashboard extends Controller
{
    public function index(){
    	return view('dashboard.index');
    }
}
