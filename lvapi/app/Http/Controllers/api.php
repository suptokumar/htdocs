<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exchange;
use App\Models\plan;
use App\Models\idmanager;
use App\Models\User;
use App\Models\exchangeconfigure;
use Hash;
class api extends Controller
{
	public function __construct()
	{
		$this->key = 'awerf1d';
        // $this->defaultkey = '$2y$10$I.A5PbGr2ur7CNpSmP59Mu45JlwuhI2mwq1CThi1Hv0rGCOhXd9Dq';
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
    	return "Key not found.";    		
    	}
    }
    public function createid(Request $request)
    {
        if (!empty($request->get("key"))) {
            
        if (Hash::check($this->key,$request->get("key"))) {
        
            $id = new idmanager();
            $id->name = $request->get('name');
            $id->phone = $request->get('phone');
            $id->exchange = $request->get('exchange');
            $id->plan = $request->get('plan');
            $id->username = $request->get('username');
            $id->password = $request->get('password');
            $id->status = empty($request->get('status'))?'pending':$request->get('status');
            $id->mode = empty($request->get('mode'))?0:$request->get('mode');
            $id->save();

            return "Id created successfuly.";

        }else{
        return "Permission Denied.";            
        }
        }else{
        return "Key not found.";            
        }
    }
    public function createuser(Request $request)
    {
        if (!empty($request->get("key"))) {
            
        if (Hash::check($this->key,$request->get("key"))) {
        
            
        // Uploading the logo to the  website
         if ($request->hasFile('file'))
            {
                $r = $request->file('file')
                    ->getPathName();
                // Save the image
                $path = public_path();
                $file = "/image/".time() . rand() . $request->file('file')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
            }else{
                $file= "/logo/user.png";
            }


        $user = new User;
        $user->name =  $request->get("name");
        $user->email =  $request->get("email");
        $user->phone =  $this->null($request->get("phone"));
        $user->address =  $this->null($request->get("address"));
        $user->password =  Hash::make($request->get("password"));
        $user->role =  empty($request->get("role"))?"User":$request->get("role");
        $user->image = $file;
        if ($user->role=="Admin") {
            $user->power = "All";
        }else{
            $user->power = "";
        }
        $user->save();

            return "User created successfuly.";

        }else{
        return "Permission Denied.";            
        }
        }else{
        return "Key not found.";            
        }
    }
    public function planlist(Request $request)
    {
        if (!empty($request->get("key"))) {
            
        if (Hash::check($this->key,$request->get("key"))) {
        return json_encode(plan::get());
        }else{
        return "Permission Denied.";            
        }
        }else{
        return "Key not found.";            
        }
    }
    public function idlist(Request $request)
    {
        if (!empty($request->get("key"))) {
            
        if (Hash::check($this->key,$request->get("key"))) {
        return json_encode(idmanager::get());
        }else{
        return "Permission Denied.";            
        }
        }else{
        return "Key not found.";            
        }
    }
    public function userlist(Request $request)
    {
        if (!empty($request->get("key"))) {
            
        if (Hash::check($this->key,$request->get("key"))) {
        return json_encode(User::get());
        }else{
        return "Permission Denied.";            
        }
        }else{
        return "Key not found.";            
        }
    }
    public function configurelist(Request $request)
    {
        if (!empty($request->get("key"))) {
            
        if (Hash::check($this->key,$request->get("key"))) {
        return json_encode(exchangeconfigure::get());
        }else{
        return "Permission Denied.";            
        }
        }else{
        return "Key not found.";            
        }
    }
}
