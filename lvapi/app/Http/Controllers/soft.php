<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class soft extends Controller
{
	function __construct()
	{
		$this->demouser = ['usertype'=>3];
	}
    public function index()
    {
    	return view("index",$this->demouser);
    }

    // Functions For Payment Details Page
    public function paymentdetails()
    {
    	return view("admin.paymentpage",$this->demouser);
    }
	public function addnewpayment()
    {
    	return view("admin.addnewpayment",$this->demouser);
    }

    // End Functions For Payment Details Page
}
