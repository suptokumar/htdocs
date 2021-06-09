<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exchange;
use App\Models\exchangeconfigure;
use Hash;
class api extends Controller
{
	public function __construct()
	{
		$this->key = 'awerf1d';
	}
    public function exchange(Request $request)
    {
    	if (!empty($request->get("key"))) {
    		
    	if (Hash::check($this->key,$request->get("key"))) {
    	return json_encode(exchange::get());
    	}else{
    	return "Permission Denied.";    		
    	}
    	}else{
    		// return Hash::make($this->key);
    	return "Key not found.";    		
    	}
    }
}
