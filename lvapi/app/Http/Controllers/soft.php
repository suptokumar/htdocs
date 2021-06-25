<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paymentdetail;
use App\Models\exchangeconfigure;
use App\Models\exchange;
use App\Models\User;
use App\Models\plan;
use App\Models\idmanager;
use App\Models\notification;
use App\Models\deposit;
use App\Models\withdrawal;
use App\Models\withrecord;
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
    public function plan()
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $exchangeconfigure = exchangeconfigure::orderBy("text","asc")->get();
            return view("admin.plan",['configure'=>$exchangeconfigure]);
        }
    }
    public  function addexchange()
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $plan = plan::orderBy("name","asc")->get();
            $exchangeconfigure = exchangeconfigure::orderBy("text","asc")->get();
            return view("admin.addexchange",['configure'=>$exchangeconfigure,'plan'=>$plan]);
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
    public function editplan($id)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            if ($editplan = plan::find($id)) {
                return view("admin.editplan",['plan'=>$editplan]);
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
                $plan = plan::get();
                return view("admin.editexchange",['exchange'=>$exchange,'configure'=>$exchangeconfigure,'plan'=>$plan]);
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
    public function deleteplan(Request $request)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
            $deleteplan = plan::find($request->get("id"));
            $deleteplan->delete();
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
            return __("Permission Failed.");
        }
    }
    public  function addplan(Request $request)
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

            $plan = new plan;
            $plan->icon = $file;
            $plan->name = $request->get("name");
            $plan->max_withdraw_amount = $request->get("max_withdraw_amount");
            $plan->max_withdraw_perday = $request->get("max_withdraw_perday");
            $plan->max_withdraw_month = $request->get("max_withdraw_month");
            $plan->min_withdraw_amount = $request->get("min_withdraw_amount");
            $plan->min_refil_amount = $request->get("min_refil_amount");
            $plan->min_maintaining_amount = $request->get("min_maintaining_amount");
            if ($plan->save()) {
                return back()->with("success", __("Plan added."));
            }else{
                return back()->with("message", __("Failed to add Plan."));
            }
        }else{
            return __("Permission Failed.");
        }
    }
    public  function editplanintodatabase(Request $request)
    {
        if ($this->power(Auth::id(),"exchange",0)) {
             // Uploading the logo to the  website
            $plan = plan::find($request->get("id"));
         if ($request->hasFile('file'))
            {
                $r = $request->file('file')
                    ->getPathName();
                // Save the image
                $path = public_path();
                $file = "/image/".time() . rand() . $request->file('file')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
            $plan->icon = $file;
            }

            $plan->name = $request->get("name");
            $plan->max_withdraw_amount = $request->get("max_withdraw_amount");
            $plan->max_withdraw_perday = $request->get("max_withdraw_perday");
            $plan->max_withdraw_month = $request->get("max_withdraw_month");
            $plan->min_withdraw_amount = $request->get("min_withdraw_amount");
            $plan->min_refil_amount = $request->get("min_refil_amount");
            $plan->min_maintaining_amount = $request->get("min_maintaining_amount");
            if ($plan->save()) {
                return back()->with("success", __("Plan saved."));
            }else{
                return back()->with("message", __("Failed to save Plan."));
            }
        }else{
            return __("Permission Failed.");
        }
    }
    public function addexchangelistintodatabase(Request $request)
    {
        $type = implode(",",$request->get("type"));
        $plan = implode(",",$request->get("plan"));
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
            $exchange->type_image = $plan;
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
$plan = implode(",",$request->get("plan"));
            $exchange->name = $request->get("name");
            $exchange->min_bit = $request->get("min_value");
            $exchange->type = $request->get("exchangeurl");
            $exchange->type_id = $type;
            $exchange->type_image = $plan;
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

    public function load_plans()
    {
        return json_encode([plan::orderBy("id","desc")->get(),[10,10,10]]);
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


            $tid = explode(",", $value->type_image);
            $result[$key]->plan = '';
            for ($i=0; $i < count($tid); $i++) { 
            if ($plan = plan::find($tid[$i])) {
                $result[$key]->plan .= "<span class='badge badge-".$this->badge()."'>".$plan->name."</span> ";
            }else{
                $result[$key]->plan .= "<span class='badge badge-danger'>".'Not Found'."</span> ";;
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

    // Start OF ID Management
    public function idmanagement()
    {
        if ($this->power(Auth::id(),"createid",0)) {
            return view("admin.idmanagement");

        }else{
            return redirect("permissionerror");
        }
    }
    public function load_plan(Request $request)
    {
        if ($this->power(Auth::id(),"createid",0)) {
            $id = $request->get("id");
            $exchange = exchange::find($id);
            $plan = $exchange->type_image;
            $plan = explode(",", $plan);
            foreach ($plan as $p)
            {
                echo '<option value="'.$p.'">'.(plan::find($p)?plan::find($p)->name:"Not Found").'</option>';
            }

        }else{
            return redirect("permissionerror");
        }
    }
    public function createnewid()
    {
        if ($this->power(Auth::id(),"createid",0)) {
            return view("admin.createnewid");

        }else{
            return redirect("permissionerror");
        }
    }


    public function load_idmanagement(Request $request)
    {
                        if ($this->power(Auth::id(),"createid",0)) {

        $search = $request->get("search");
        $type = $request->get("type");
        if ($type=='') {
        $and = "idmanagers WHERE (`name` LIKE '%$search%' OR `phone` LIKE '%$search%')";
        }else{
        $and = "idmanagers WHERE (`name` LIKE '%$search%' OR `phone` LIKE '%$search%') AND status='$type'";
        }

        // $page = 1;
        $page = $request->get("page");
        $limit = $this->limit;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11

 END,

            id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
 END,
            id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $result[$c]->updated_at = date("Y/m/d h:i a", strtotime($value->updated_at));
            $result[$c]->exchange = exchange::find($value->exchange)->name;
            $result[$c]->plan = plan::find($value->plan)->name;

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
        }else{
            return redirect("permissionerror");
        }
    }


    public function deleteid(Request $request)
    {
        if ($this->power(Auth::id(),"createid",0)) {
            $idmanager = idmanager::find($request->get("id"));
            $idmanager->status='deleted';
            $this->send($idmanager->name, $idmanager->phone, "Your ID request (exchange:".exchange::find($idmanager->exchange)->name.", plan:".plan::find($idmanager->plan)->name.") has been deleted by the administrator.", Auth::user()->name,0);
            $idmanager->save();
            return __("Deleted");
        }else{
            return __("Permission Denied");
        }
    }

    public function createnewidaddintodatabase(Request $request)
    {
        if ($this->power(Auth::id(),"createid",0)) {
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
            return back()->with("success",__("New ID created"));
        }else{
            return back()->with("message",__("Permission Denied"));
        }
    }

    public function idactions(Request $request)
    {
        if ($this->power(Auth::id(),"createid",0)) {
            return view("admin.actionid");
        }else{
            return redirect("permissionerror");
        }
    }



    // End OF ID Management



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
    public static function badge()
    {
        $ar = ['success','info','primary','light'];
        $rand = rand(0,count($ar)-1);
        return $ar[$rand];
    }
    public static function send($user,$phone, $content, $console,$mode)
    {
        $notification = new notification;
        $notification->name = $user;
        $notification->phone = $phone;
        $notification->content = $content;
        $notification->console = $console;
        $notification->mode = $mode;
        $notification->save();
        return $notification;
    }
    public static function getuserbyphone($phone)
    {
        return User::where("phone","=",$phone)->first();
    }
    public static function wallet($id)
    {
        $deposit = deposit::where([["phone","=",$id],["status","=",'Approved']])->get();
        $account = 0;
        foreach ($deposit as $key => $value) {
            if ($value->currency == 'INR') {
                $account+= $value->amount;
            }
        }
        $withdrawal = withdrawal::where([["phone","=",$id],["status","!=",'declined']])->get();
        foreach ($withdrawal as $key => $value) {
            if ($value->currency == 'INR') {
                $account-= $value->amount;
            }
        }
        return $account;

    }





}
