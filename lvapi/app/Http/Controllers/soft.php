<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paymentdetail;

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
	public function editgateway($id)
    {
    	$gateway= paymentdetail::find($id);
    	return view("admin.editgateway",['usertype'=>3,'gateway'=>$gateway]);
    }
    public function addgateway(Request $request)
    {

    	// Uploading the logo to the  website

    	 if ($request->hasFile('file'))
            {
                $r = $request->file('file')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/image/";
                $file = time() . rand() . $request->file('file')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
            }else{
            	return back()->with("message","Failed to Read Your File");
            }


    	$paymentdetail = new paymentdetail;
    	$paymentdetail->name =  $request->get("name");
    	$paymentdetail->icon =  "/image/".$file;

    	$name_cls = explode(",", $request->get("name_cls"));
    	$details_name = [];
    	foreach ($name_cls as $value) {
    		array_push($details_name,  $request->get("gc".$value));
    	}


    	$value_cls = explode(",", $request->get("value_cls"));
    	$details_value = [];
    	foreach ($value_cls as $value) {
    		array_push($details_value,  $request->get("gc".$value));
    	}


    	$paymentdetail->details_name =  implode(",", $details_name);
    	$paymentdetail->details_value =  implode(",", $details_value);
    	$paymentdetail->status =  0;
    	$paymentdetail->creator =  0;
    	$paymentdetail->save();
    	return back()->with("success","Payment Gateway ".$request->get("name")." has been added.");
	
	}
	public function editpaymentgateway(Request $request)
    {

    	// Uploading the logo to the  website

    	 if ($request->hasFile('file'))
            {
                $r = $request->file('file')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/image/";
                $file = time() . rand() . $request->file('file')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
            }else{
            	return back()->with("message","Failed to Read Your File");
            }


    	$paymentdetail = paymentdetail::find($request->get("id"));
    	$paymentdetail->name =  $request->get("name");
    	$paymentdetail->icon =  "/image/".$file;

    	$name_cls = explode(",", $request->get("name_cls"));
    	$details_name = [];
    	foreach ($name_cls as $value) {
    		array_push($details_name,  $request->get("gc".$value));
    	}


    	$value_cls = explode(",", $request->get("value_cls"));
    	$details_value = [];
    	foreach ($value_cls as $value) {
    		array_push($details_value,  $request->get("gc".$value));
    	}


    	$paymentdetail->details_name =  implode(",", $details_name);
    	$paymentdetail->details_value =  implode(",", $details_value);
    	$paymentdetail->status =  0;
    	$paymentdetail->creator =  0;
    	$paymentdetail->save();
    	return back()->with("success","Payment Gateway ".$request->get("name")." has been Updated.");
	
	}

	public function load_gateway()
	{
		$gateway =  paymentdetail::get();
		return json_encode([$gateway]);
	}
	public function statuschanger(Request $request)
	{
		$gateway = paymentdetail::find($request->get("id"));
		if ($gateway->status=='0') {
			$gateway->status='1';
		}else{
			$gateway->status='0';
		}
		$gateway->save();
		return;
	}

	public function deletepaymentgateway(Request $request)
	{
		$gateway = paymentdetail::find($request->get("id"));
		$gateway->delete();
		return;
	}

    // End Functions For Payment Details Page
}
