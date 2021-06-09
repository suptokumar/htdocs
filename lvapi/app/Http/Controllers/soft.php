<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paymentdetail;
use App\Models\exchangeconfigure;
use App\Models\exchange;
use App\Models\User;
use DB;
use Hash;
use Auth;
class soft extends Controller
{
    function __construct()
    {
        $this->limit = 30;
    }
    public function index()
    {
        return view("index");
    }
    // Functions For Login
    public function permissionerror()
    {
        return "Permission Denied For a User. <a href='logout'>Logout Now</a>";
    }public function login()
    {
        return view("login");
    }
    public function logout()
    {
        Auth::logout();
        return redirect("login");
    }
    public function makelogin(Request $request)
    {
        $details = [
            'email'=>$request->get("email"),
            'password'=>$request->get("password"),
        ];
        if (Auth::attempt($details,1)) {
            return redirect("/admin");
        }else{
            return back()->with("message","Login failed");
        }
    }

    // Functions For Payment Details Page
    public function paymentdetails()
    {
        if ($this->power(Auth::id(),"paymentdetails",0)) {
        return view("admin.paymentpage");
        }else{
            return redirect("permissionerror");
        }
    }
    public function addnewpayment()
    {
        if ($this->power(Auth::id(),"paymentdetails",0)) {
            return view("admin.addnewpayment");
        }else{
            return redirect("permissionerror");
        }
    }
    public function editgateway($id)
    {
       if ($this->power(Auth::id(),"paymentdetails",0)) {

        $gateway= paymentdetail::find($id);
        return view("admin.editgateway",['gateway'=>$gateway]);
        }else{
            return redirect("permissionerror");
        }
    }
    public function addgateway(Request $request)
    {
                if ($this->power(Auth::id(),"paymentdetails",0)) {


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
        }else{
            return redirect("permissionerror");
        }
    
    }
    public function editpaymentgateway(Request $request)
    {
                if ($this->power(Auth::id(),"paymentdetails",0)) {


        // Uploading the logo to the  website
        $paymentdetail = paymentdetail::find($request->get("id"));

         if ($request->hasFile('file'))
            {
                $r = $request->file('file')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/image/";
                $file = time() . rand() . $request->file('file')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
        $paymentdetail->icon =  "/image/".$file;
            }else{
            }


        $paymentdetail->name =  $request->get("name");

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
        }else{
            return redirect("permissionerror");
        }
    
    }

    public function load_gateway()
    {
                if ($this->power(Auth::id(),"paymentdetails",0)) {

        $gateway =  paymentdetail::get();
        return json_encode([$gateway]);
        }else{
            return redirect("permissionerror");
        }
    }
    public function statuschanger(Request $request)
    {
                if ($this->power(Auth::id(),"paymentdetails",0)) {

        $gateway = paymentdetail::find($request->get("id"));
        if ($gateway->status=='0') {
            $gateway->status='1';
        }else{
            $gateway->status='0';
        }
        $gateway->save();
        return;
        }else{
            return redirect("permissionerror");
        }
    }

    public function deletepaymentgateway(Request $request)
    {
                if ($this->power(Auth::id(),"paymentdetails",0)) {

        $gateway = paymentdetail::find($request->get("id"));
        $gateway->delete();
        return;
        }else{
            return redirect("permissionerror");
        }
    }

    // End Functions For Payment Details Page

    // Starting Of User Management
    public function users()
    {
        if ($this->power(Auth::id(),"users",0)) {

        return view("admin.users");
        }else{
            return redirect("permissionerror");
        }
    }


    public function createusers()
    {
                        if ($this->power(Auth::id(),"users",0)) {

        return view("admin.addusers");
        }else{
            return redirect("permissionerror");
        }
    }
    public function edituser($id)
    {
                        if ($this->power(Auth::id(),"users",0)) {

        if ($users = User::find($id)) {
            return view("admin.edituser",["users"=>$users,'usertype'=>3]);
        }else{
            return back();
        }
        }else{
            return redirect("permissionerror");
        }
    }
    public function privileges($id)
    {
                        if ($this->power(Auth::id(),"users",0)) {

        if ($users = User::find($id)) {
            return view("admin.privileges",["users"=>$users,'usertype'=>3]);
        }else{
            return back();
        }
        }else{
            return redirect("permissionerror");
        }
    }
    public function privilegessave(Request $request)
    {
                        if ($this->power(Auth::id(),"users",0)) {

        $privilege = [];
        if (!empty($request->get("createid"))) {
            array_push($privilege, 'createid');
        }
        if (!empty($request->get("paymentdetails"))) {
            array_push($privilege, 'paymentdetails');
        }
        if (!empty($request->get("referearn"))) {
            array_push($privilege, 'referearn');
        }
        if (!empty($request->get("deposit"))) {
            array_push($privilege, 'deposit');
        }
        if (!empty($request->get("faq"))) {
            array_push($privilege, 'faq');
        }
        if (!empty($request->get("users"))) {
            array_push($privilege, 'users');
        }
        if (!empty($request->get("exchange"))) {
            array_push($privilege, 'exchange');
        }
        if (!empty($request->get("support"))) {
            array_push($privilege, 'support');
        }
        if (!empty($request->get("announcement"))) {
            array_push($privilege, 'announcement');
        }
        if (!empty($request->get("offer"))) {
            array_push($privilege, 'offer');
        }
        if (!empty($request->get("bannar"))) {
            array_push($privilege, 'bannar');
        }
        if (!empty($request->get("notifications"))) {
            array_push($privilege, 'notifications');
        }
        if (!empty($request->get("terms"))) {
            array_push($privilege, 'terms');
        }
        if (!empty($request->get("howtouse"))) {
            array_push($privilege, 'howtouse');
        }
        if (!empty($request->get("withdrawal"))) {
            array_push($privilege, 'withdrawal');
        }
        $user = User::find($request->get("id"));
        $user->power = implode(",", $privilege);
        if ($user->save()) {
            return back()->with("success","Saved !");
        }else{
            return back()->with("message","Failed to save !");
        }
        }else{
            return redirect("permissionerror");
        }
        
    }
    public function adduserintodatabase(Request $request)
    {
                if ($this->power(Auth::id(),"users",0)) {

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
        $user->role =  $request->get("role");
        $user->image = $file;
        if ($user->role=="Admin") {
            $user->power = "All";
        }else{
            $user->power = "";
        }
        $user->save();
        return back()->with("success","User ".$request->get("name")." has been added.");
        }else{
            return redirect("permissionerror");
        }
    
    }
    public function deleteusers(Request $request)
    {
                        if ($this->power(Auth::id(),"users",0)) {

        if ($user = User::find($request->get("id"))) {
            $user->delete();
            return "Deleted";
        }
        }else{
            return redirect("permissionerror");
        }
    }

    public function updateusers(Request $request)
    {
                if ($this->power(Auth::id(),"users",0)) {

        // Uploading the logo to the  website

        $user = User::find($request->get("id"));
         if ($request->hasFile('file'))
            {
                $r = $request->file('file')
                    ->getPathName();
                // Save the image
                $path = public_path();
                $file = "/image/".time() . rand() . $request->file('file')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
        $user->image = $file;
            }


        $user->name =  $request->get("name");
        $user->email =  $request->get("email");
        $user->phone =  $this->null($request->get("phone"));
        $user->address =  $this->null($request->get("address"));
      if(empty($request->get("password")) || $request->get("password")==''){
        
      }else{
       $user->password =  Hash::make($request->get("password"));
      }
        $user->role =  $request->get("role");
        if ($user->role=="Admin") {
            $user->power = "All";
        }
        $user->save();
        return back()->with("success","User ".$request->get("name")." has been updated.");
        }else{
            return redirect("permissionerror");
        }
    
    }

    public function load_user(Request $request)
    {
                        if ($this->power(Auth::id(),"users",0)) {

        $search = $request->get("search");
        $type = $request->get("type");
        if ($type=='') {
        $and = "users WHERE (`name` LIKE '%$search%' OR `email` LIKE '%$search%')";
        }else{
        $and = "users WHERE (`name` LIKE '%$search%' OR `email` LIKE '%$search%') AND role='$type'";
        }

        // $page = 1;
        $page = $request->get("page");
        $limit = $this->limit;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11

 END,

            id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
 END,
            id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $result[$c]->updated_at = date("Y/m/d h:i a", strtotime($value->updated_at));

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
        }else{
            return redirect("permissionerror");
        }
    }





    // End Of user Management

    // Start Exchange Management

    public function exchange()
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $exchangeconfigure = exchangeconfigure::orderBy("text","asc")->get();
            return view("admin.exchange",['configure'=>$exchangeconfigure]);
        }
    }
    public  function addexchange()
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $exchangeconfigure = exchangeconfigure::orderBy("text","asc")->get();
            return view("admin.addexchange",['configure'=>$exchangeconfigure]);
        }
    }
    public  function addconfigure()
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            return view("admin.addconfigure");
        }
    }
    public function editconfigure($id)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            if ($exchangeconfigure = exchangeconfigure::find($id)) {
                return view("admin.editconfigure",['configure'=>$exchangeconfigure]);
            }else{
                return back();
            }
        }else{
            return redirect("permissionerror");
        }
    }
    public function editexchange($id)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            if ($exchange = exchange::find($id)) {
                $exchangeconfigure = exchangeconfigure::get();
                return view("admin.editexchange",['exchange'=>$exchange,'configure'=>$exchangeconfigure]);
            }else{
                return back();
            }
        }else{
            return redirect("permissionerror");
        }
    }
    public function deleteconfigure(Request $request)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $exchangeconfigure = exchangeconfigure::find($request->get("id"));
            $exchangeconfigure->delete();
            return "Deleted";
        }else{
            return "Permission Denied";
        }
    }
    public function deleteexchange(Request $request)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $deleteexchange = exchange::find($request->get("id"));
            $deleteexchange->delete();
            return "Deleted";
        }else{
            return "Permission Denied";
        }
    }
    public  function addconfigureintodatabase(Request $request)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
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

            $exchangeconfigure = new exchangeconfigure;
            $exchangeconfigure->logo = $file;
            $exchangeconfigure->text = $request->get("name");
            $exchangeconfigure->additional_info = '';
            if ($exchangeconfigure->save()) {
                return back()->with("success", "Configure added.");
            }else{
                return back()->with("message", "Failed to add configure.");
            }
        }else{
            return "Permission Failed.";
        }
    }
    public function addexchangelistintodatabase(Request $request)
    {
        $type = implode(",",$request->get("type"));
        if ($this->power(Auth::id(),"exchange",0)) {
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

            $exchange = new exchange;
            $exchange->logo = $file;
            $exchange->name = $request->get("name");
            $exchange->min_bit = $request->get("min_value");
            $exchange->type = $request->get("exchangeurl");
            $exchange->type_id = $type;
            $exchange->type_image = '';
            if ($exchange->save()) {
                return back()->with("success", "Exchange added.");
            }else{
                return back()->with("message", "Failed to add exchange.");
            }
        }else{
            return "Permission Failed.";
        }
    }
    public function editexchangelist(Request $request)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $exchange = exchange::find($request->get("id"));
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
            $exchange->logo = $file;
            }
$type = implode(",",$request->get("type"));
            $exchange->name = $request->get("name");
            $exchange->min_bit = $request->get("min_value");
            $exchange->type = $request->get("exchangeurl");
            $exchange->type_id = $type;
            $exchange->type_image = '';
            if ($exchange->save()) {
                return back()->with("success", "Exchange edited.");
            }else{
                return back()->with("message", "Failed to edit exchange.");
            }
        }else{
            return "Permission Failed.";
        }
    }
    public  function editconfigureintodatabase(Request $request)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
             // Uploading the logo to the  website
            $exchangeconfigure = exchangeconfigure::find($request->get("id"));
         if ($request->hasFile('file'))
            {
                $r = $request->file('file')
                    ->getPathName();
                // Save the image
                $path = public_path();
                $file = "/image/".time() . rand() . $request->file('file')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
            $exchangeconfigure->logo = $file;
            }

            $exchangeconfigure->text = $request->get("name");
            $exchangeconfigure->additional_info = '';
            if ($exchangeconfigure->save()) {
                return back()->with("success", "Configure saved.");
            }else{
                return back()->with("message", "Failed to save configure.");
            }
        }else{
            return "Permission Failed.";
        }
    }
    public function load_configures()
    {
        return json_encode([exchangeconfigure::orderBy("id","desc")->get(),[10,10,10]]);
    }


    public function load_exchange(Request $request)
    {
                        if ($this->power(Auth::id(),"exchange",0)) {

        $search = $request->get("search");
        $type = $request->get("type");
        if ($type=='') {
        $and = "exchanges WHERE (`name` LIKE '%$search%')";
        }else{
        $and = "exchanges WHERE (`name` LIKE '%$search%') AND type_id LIKE '%$type%'";
        }

        // $page = 1;
        $page = $request->get("page");
        $limit = $this->limit;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11

 END,

            id DESC LIMIT $from,$limit;
            ");


        foreach ($result as $key => $value) {
            $result[$key]->configure = '';
            $result[$key]->configure_logo = '';
            $tid = explode(",", $value->type_id);
            for ($i=0; $i < count($tid); $i++) { 
            if ($configure = exchangeconfigure::find($tid[$i])) {
                $result[$key]->configure .= ",".$configure->text;
                $result[$key]->configure_logo .= ",".$configure->logo;
            }else{
                $result[$key]->configure .= ",".$value->type;
                $result[$key]->configure_logo .= ",".$value->type_image;
            }
            }
        }
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11

 END,
            id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $result[$c]->updated_at = date("Y/m/d h:i a", strtotime($value->updated_at));

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
        }else{
            return redirect("permissionerror");
        }
    }





    // End OF Exchange Management

    // Public Functions

    public static function null($value,$number=0)
    {
        if ($number==0) {
            return empty($value)?"":$value;
        }else{
            return empty($value)?"0":$value;
        }
    }

    public static function power($user,$route,$rm = 1)
    {
        $user = User::find($user);
        if ($user->role=="Admin") {
            if ($rm=1) {return 1;}else{return "checked";}
        }
        $power = $user->power;
        $par = explode(",", $power);
        if ($rm=1) {
        if (in_array($route, $par)) {
            return "checked";
        }else{
            return "";
        }
        }else{

        if (in_array($route, $par)) {
            return 1;
        }else{
            return 0;
        }   
        }
    }




}
