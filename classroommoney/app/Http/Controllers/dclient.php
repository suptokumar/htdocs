<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\course;
use App\Models\notification;
use App\Models\client;
use App\Models\payment;
use App\Models\report;
use App\Models\waiting;
use App\Mail\email;
use Illuminate\Support\Facades\Mail;
use DB;
use File;
use Image;
class dclient extends Controller
{
    public function add_waitings(){
        return view("admin.waitings");
    }
    public function add_waitings_id($id){
        if ($waitings = waiting::find($id)) {
        return view("admin.edit_waitings",["w"=>$waitings]);
        }else{
            return back();
        }
    }
    public function waitings_post(Request $request){
        $waiting = new waiting;
        $waiting->student_info = $request->get("name");
        $waiting->contact = $request->get("contact");
        $waiting->reach = $request->get("reach");
        $waiting->follower = $request->get("follower");
        $waiting->time_to_contact = $request->get("time_to_contact");
        if ($waiting->save()) {
            return back()->with("success","Successfully Saved!");
        }else{
            return back()->with("message","Failed to Save!");

        }
        
    }
    public function delete_waiting(Request $request){
        if($waiting = waiting::find($request->get("id"))){
            $waiting->delete();
            return "Successfully Deleted";
        }else{
            return "Not Found";
        }
    }
    public function waitings_edit(Request $request){
        $waiting = waiting::find($request->get("id"));
        $waiting->student_info = $request->get("name");
        $waiting->contact = $request->get("contact");
        $waiting->reach = $request->get("reach");
        $waiting->follower = $request->get("follower");
        $waiting->time_to_contact = $request->get("time_to_contact");
        if ($waiting->save()) {
            return back()->with("success","Successfully Edited!");
        }else{
            return back()->with("message","Failed to edit!");

        }
        
    }
    public function waitings(){
        return view("admin.waitings_list");
    }


    public function waitings_list(Request $request){
        $search = $request->get("search");
        $and = "waitings WHERE (student_info LIKE '%$search%' OR contact LIKE '%$search%' OR follower LIKE '%$search%' OR reach LIKE '%$search%')";
        

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
        
    return json_encode([$result,[count($total), $page, $limit]]);
    }
    public function login(Request $request){
        if (Auth::check()) {
            Auth::logout();
        }


            $user = User::find($request->get("id"));

            $user_details2s = [
                'email'=>$user->email,
                'phone'=>$user->phone
            ];
            if (Auth::loginUsingId($user->id, true)) {
                    if(Auth::user()->key==1){
                        Auth::logout();
                        return redirect("login")->with('error','You are blocked.');
                    }
                if ($request->get("redirect")=='') {
                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
            }
            return redirect("login")->with('error','Wrong Login Details.');
            
    
    }
    public function payment(Request $req){
    	$type = $req->get("type");
    	$client = $req->get("client");
    	$date = $req->get("date");
    	$hours = $req->get("hours");

    	if ($type == 1) {
    		$user = User::where("email","=",$client)->first();
    		if (!$user) {
    			return back()->with("message",__("The student is not found."));
    		}
    		$user->hours= intval($user->hours)+intval($hours)*60;
    		$user->save();
    	}
    	if ($type == 2) {
    		$user = client::where("key","=",$client)->first();
    		if (!$user) {
    			return back()->with("message",__("The client is not found."));
    		}
    		$user->hours= intval($user->hours)+intval($hours)*60;
    		$user->save();
    	}
    	$payment =  new payment;
    	$payment->date = $date;
    	$payment->hours = $hours;
        $payment->invoice = empty($req->get("invoice"))?'':$req->get("invoice");
        $payment->fees = empty($req->get("fees"))?'':$req->get("fees");
        $payment->transfer_fees = empty($req->get("transfer_fees"))?'':$req->get("transfer_fees");
        $payment->extra_payment = empty($req->get("extra_payment"))?'':$req->get("extra_payment");
    	$payment->adder = Auth::user()->name;
    	$payment->timezone = Auth::user()->timezone;
    	$payment->type = ($type==1 ? "Student" : "Client");
    	$payment->user = ($type==1 ? $user->id : $user->key);
    	$payment->save();
    	return back()->with("success",__("Successfully added the payment."));

    }
    public function get_payment(Request $request){


// functions for the admin to manage class

        $search = $request->get("search");
        $and = "payments WHERE (date LIKE '%$search%' OR adder LIKE '%$search%')";
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $key => $value) {
        	$data = [];
        	if ($value->type=="Student") {
            $user_name = User::find($value->user);
        	$data[0] = $user_name->name;
        	$data[1] = $user_name->email;
        	}else{
        		 $user_name = client::where("key","=",$value->user)->first();
        	$data[0] = $user_name->name;
        	$data[1] = $user_name->email;
        	}

        	array_push($status, $data);
        }
    return json_encode([$result,[count($total), $page, $limit],$status]);
    


    }


    public function my_class(){
        $me = Auth::id();
        $m = date("m");
        $y = date("Y");
        $attend = DB::select("SELECT * FROM reports WHERE s_id='$me' AND guest=1");
        $attends = DB::select("SELECT * FROM reports WHERE s_id='$me' AND guest=1 AND month(`starting`)='$m' AND year(`starting`)='$y'");
        $not_attended = DB::select("SELECT * FROM reports WHERE s_id='$me' AND guest=0");
        $not_attendeds = DB::select("SELECT * FROM reports WHERE s_id='$me' AND guest=0 AND month(`starting`)='$m' AND year(`starting`)='$y'");
        $last_payment_date = DB::select("SELECT * FROM payments WHERE user='$me' AND type='Student' ORDER BY id DESC LIMIT 1");
        $last_payment = strtotime($last_payment_date[0]->date) + 3600*24*30;
        
    	return view("my_class",["attend"=>[count($attend), count($attends)],"not_attended"=>[count($not_attended), count($not_attendeds)],"last_payment"=>[$last_payment_date[0]->date,date("Y-m-d",$last_payment)]]);
    }
    public function my_classt(){
                $me = Auth::id();
         $m = date("m");
        $y = date("Y");
        $attend = DB::select("SELECT * FROM reports WHERE t_id='$me' AND guest_active=1");
        $attends = DB::select("SELECT * FROM reports WHERE t_id='$me' AND guest_active=1 AND month(`starting`)='$m' AND year(`starting`)='$y'");
        $not_attended = DB::select("SELECT * FROM reports WHERE t_id='$me' AND guest_active=0");
        $not_attendeds = DB::select("SELECT * FROM reports WHERE t_id='$me' AND guest_active=0 AND month(`starting`)='$m' AND year(`starting`)='$y'");
        return view("my_class",["attend"=>[count($attend), count($attends)],"not_attended"=>[count($not_attended), count($not_attendeds)]]);
    }

    public function laod_class(Request $request)
    {
        $search = $request->get("search");
        if (Auth::user()->type==2) {
        $and = "courses WHERE (title LIKE '%$search%' OR ras LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%') AND s_id='".Auth::id()."'";
        }else if(Auth::user()->type==1){
        $and = "courses WHERE (title LIKE '%$search%' OR ras LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%') AND t_id='".Auth::id()."'";
        }else{
        $and = "courses WHERE (title LIKE '%$search%' OR ras LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%')";

        }
        

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY title ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY title ASC;
            ");
        $starting_time = [];
        $status = [];
        $upc = [];
        $upc2 = [];
        $clin = [];
        foreach ($result as $key => $value) {
            $s_d =  user::find($value->s_id);
            $t_d = user::find($value->t_id);
            array_push($clin, [$s_d->name, $t_d->name]);
            $result[$key]->repeat = substr($value->repeat, 1);
            date_default_timezone_set($value->timezone);
            $pre_v = strtotime($value->starting);
            $result[$key]->guest = substr($value->guest, 1);
            date_default_timezone_set(Auth::user()->timezone);
            array_push($starting_time, [date("Y-m-d h:ia", $pre_v), date_default_timezone_get()]);
            if ($value->repeat=='' && strtotime($value->starting)==strtotime($value->lastclass)) {
            array_push($status, "Finished");
            }else{
            array_push($status, "Open");
            }

            // make lst_c
             date_default_timezone_set($value->timezone);

        $a1 = date("Y-m-d", strtotime(empty($value->lastclass)?$value->starting:$value->lastclass));
        $a2 = date("H:i:s", strtotime($value->starting));
        $a3 = strtotime($a1." ".$a2);

        $lst_c = $a3 + 86400;
        $class_limit = 7;
        $upcoming_class = '';
        $upcoming_class2 = [];
        $repeat = explode(",",$value->repeat);
        while (true) {
            if ($class_limit==0) {
                break;
            }
        $next_class = date("l",$lst_c);
            if(in_array($next_class, $repeat)){
                $class_limit--;
                date_default_timezone_set(Auth::user()->timezone);
               array_push($upcoming_class2, $lst_c-time());
               if ($lst_c-time() < (3600*24*3)) {
                $upcoming_class .= "<span style='border: 1px solid green; padding: 3px; display: block;'>".date("D, Y-m-d h:ia", $lst_c)."</span>";
                   
               }else if ($lst_c-time() < (3600*24*2)) {
                $upcoming_class .= "<span style='border: 1px solid red; padding: 3px; display: block;'>".date("D, Y-m-d h:ia", $lst_c)."</span>";
                   
               }else{
                $upcoming_class .= date("D, Y-m-d h:ia", $lst_c)."<br>";
               }
             date_default_timezone_set($value->timezone);
                $lst_c += 86400;
                continue;
            }else{
                $lst_c += 86400;
                $next_class = date("l",$lst_c);
            }
        }        
            array_push($upc, $upcoming_class);
            array_push($upc2, $upcoming_class2[0]);
    



        }
    return json_encode([$result,[count($total), $page, $limit],$starting_time,$status,$upc,$upc2,$clin]);
    }

    public function manage_class(){
        return view("manage_class");
    }





    public function load_reports(Request $request){
        $search = $request->get("search");
        if (Auth::user()->type==2) {
        $and = "reports WHERE (title LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%' OR ras LIKE '%$search%') AND s_id='".Auth::id()."'";
        }else if(Auth::user()->type==1){
        $and = "reports WHERE (title LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%' OR ras LIKE '%$search%') AND t_id='".Auth::id()."'";
        }else{
        $and = "reports WHERE (title LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%' OR ras LIKE '%$search%')";

        }
        

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
        $starting_time = [];
        $status = [];
        foreach ($result as $key => $value) {
            $result[$key]->repeat = substr($value->repeat, 1);
            date_default_timezone_set($value->timezone);
            $pre_v = strtotime($value->starting);
            $sql = "SELECT * FROM reports WHERE ras='$value->ras' AND id<$value->id";
            $res = count(DB::select($sql));
            date_default_timezone_set(Auth::user()->timezone);
            array_push($starting_time, [date("Y-m-d h:ia", $pre_v), (($res)+1),Auth::user()->type,Date("Y-m-d h:ia", strtotime($value->starting)+(86400/2))]);   
        }
    return json_encode([$result,[count($total), $page, $limit],$starting_time]);
    }
    public function mark_attendence(Request $request){
        $id = $request->get("id");
        $type = $request->get("type");
        $report = report::find($id);
        if ($type==2) {
            if ($report->guest==1) {
                # code...
            $report->guest=0;
            }else{
            $report->guest=1;

            }
        }else{
            if ($report->guest_active==1) {
                # code...
            $report->guest_active=0;
            }else{
            $report->guest_active=1;

            }
        }
        $report->save();
        return;
    }
    public function assignment($id){
        if (Auth::user()->type==1) {
            return back();
        }
        $result = report::find($id);
        if (!$result) {
            return back();
        }
        if (Auth::user()->type != 3) {
        
        if ($result->s_id != Auth::id()) {
            return back();
        }
        }
        return view("assignment_upload",["report"=>$id]);
    }
    public function notes($id){
        if (Auth::user()->type==2) {
            return back();
        }
        $result = report::find($id);
        if (!$result) {
            return back();
        }
        if (Auth::user()->type != 3) {
        
        if ($result->t_id != Auth::id()) {
            return back();
        }
        }
        return view("note_upload",["report"=>$id]);
    }
}
