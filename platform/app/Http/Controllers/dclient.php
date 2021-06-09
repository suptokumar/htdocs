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
use App\Models\change;

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








public function upcoming_cls($sql,$start)
{
$class = DB::select($sql);

            $data = [];
            $crt = strtotime($start);
            $mxt = strtotime($start) + 3600 * 24 * 30;
            foreach ($class as $key => $value)
            {
            date_default_timezone_set($value->timezone);
                 // add the changes
                if ($value->repeat == '')
                {
                    $nst =  date("Y-m-d H:i:s",  strtotime($value->starting));
                            // date_default_timezone_set($value->timezone);
                            $mst = strtotime($nst);

                    $change = change::where([["class_id", "=", $value->ras], ["replacetime", "=", $mst ]])->orderBy("id","desc")
                        ->first();
                    if ($change)
                    {
                        if ($change->status != '0')
                        {
                            if ($change->app > $crt && $change->app < $mxt)
                            {
                                date_default_timezone_set($change->timezone);
                                    $nod = date("Y-m-d H:i:s",$change->app);
                                    // date_default_timezone_set(Auth::user()->timezone);
                                    $change->app = strtotime($nod);
                                        
                                date_default_timezone_set(Auth::user()->timezone);
                                    array_push($data, [$change->app, date("D, M d,Y h:i a", $change->app) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mxt]);
                            }
                        }
                    }
                    else
                    {

                            // date_default_timezone_set($value->timezone);
                                $ntr = date("Y-m-d H:i:s",strtotime($value->starting));
                                $nxt = strtotime($ntr);
                                if ($nxt>$crt) {
                                date_default_timezone_set(Auth::user()->timezone);
                            array_push($data, [$nxt , date("D, M d,Y h:i a", $nxt) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst ]);
                                }
                        }
                    
                }
                else
                {
                    $repeat = explode(",", $value->repeat);
                    $nxt = empty($value->lastclass) ? (strtotime($value->starting)) : (strtotime($value->lastclass) + 24 * 3600);
                    while (true)
                    {
                        if ($nxt > $mxt)
                        {
                            break;
                        }
                        if (in_array(date("l", $nxt) , $repeat))
                        {
                            $nst =  date("Y-m-d H:i:s", $nxt);
                            // date_default_timezone_set($value->timezone);
                            $mst = strtotime($nst);
                            // date_default_timezone_set(Auth::user()->timezone);
                            $change = change::where([["class_id", "=", $value->ras], ["replacetime", "=", $mst]])->orderBy("id","desc")->first();
                            if ($change)
                            {
                                if ($change->status != '0' && $change->app>$crt)
                                {
                                
                                    // date_default_timezone_set($change->timezone);
                                    $nod = date("Y-m-d H:i:s",$change->app);
                                    // date_default_timezone_set(Auth::user()->timezone);
                                    $change->app = strtotime($nod);
                                    // date_default_timezone_set($change->timezone);
                                date_default_timezone_set(Auth::user()->timezone);

                                    array_push($data, [$change->app, date("D, M d,Y h:i a", $change->app) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst]);
                                }
                            }
                            else
                            {
                                if( $nxt>$crt){
                                date_default_timezone_set(Auth::user()->timezone);
                                array_push($data, [$nxt, date("D, M d,Y h:i a", $nxt) ,$value->subject , $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst]);
                                }
                            }
                            $nxt += 24 * 3600;
                        }
                        else
                        {
                            $nxt += 24 * 3600;
                        }
                    }
                }
            }


            usort($data, function ($a, $b)
            {
                return $a[0] > $b[0] ? 1 : -1;
            });
    return $data;
    
}












    public function reports($year,$month)
    {
        $total_student = User::where("type","=","2")->count();
        $total_teacher = User::where("type","=","1")->count();
        $total_active = User::where([["type","=","2"],["status","=","active"]])->count();
        $total_inactive = User::where([["type","=","2"],["status","!=","active"]])->count();
        $waitings = waiting::where("done","=","0")->count();

        $doneclass = count(DB::select("SELECT * FROM `reports` WHERE year(`starting`)='$year' AND month(`starting`)='$month'"));
        $total_deleted = count(DB::select("SELECT * FROM `changes` WHERE year(`created_at`)='$year' AND month(`created_at`)='$month' AND status='0'"));
        $total_changed = count(DB::select("SELECT * FROM `changes` WHERE year(`created_at`)='$year' AND month(`created_at`)='$month' AND status=''"));
        $missed_class = count(DB::select("SELECT * FROM `reports` WHERE year(`starting`)='$year' AND month(`starting`)='$month' AND status='0'"));
        $total_clients = count(DB::select("SELECT * FROM `clients`"));
        $numberofpaidinvoice = count(DB::select("SELECT * FROM `payments`  WHERE year(`created_at`)='$year' AND month(`created_at`)='$month' group by `invoice`"));
        $feeandtransfer = DB::select("SELECT SUM(fees) as fees,SUM(transfer_fees) as transfer FROM `payments`  WHERE year(`created_at`)='$year' AND month(`created_at`)='$month' group by `invoice`");
        $transfer = empty($feeandtransfer[0]->transfer)?"0":$feeandtransfer[0]->transfer;
        $fees = empty($feeandtransfer[0]->fees)?"0":$feeandtransfer[0]->fees;
        $total_remaining_hours = DB::select("SELECT SUM(hours) as sm FROM `users` WHERE type=2")[0]->sm/60;
        $upcoming_cls = count($this->upcoming_cls("SELECT * FROM courses", "$year-$month-01"));
        $total_cls = $doneclass+$upcoming_cls;
        $qm = count(DB::SELECT("select * from courses where subject='Quran Memorization' AND year(`updated_at`)='$year' AND month(`updated_at`)='$month'  GROUP BY s_id"));
        $qr = count(DB::SELECT("select * from courses where subject='Quran Recitation' AND year(`updated_at`)='$year' AND month(`updated_at`)='$month'  GROUP BY s_id"));
        $al = count(DB::SELECT("select * from courses where subject='Arabic language' AND year(`updated_at`)='$year' AND month(`updated_at`)='$month'  GROUP BY s_id"));
        $is = count(DB::SELECT("select * from courses where subject='Islamic Studies' AND year(`updated_at`)='$year' AND month(`updated_at`)='$month'  GROUP BY s_id"));
        

        return view("reports",["total_student"=>$total_student,"total_teacher"=>$total_teacher,"total_active"=>$total_active,"total_inactive"=>$total_inactive,"waitings"=>$waitings,"doneclass"=>$doneclass,"total_deleted"=>$total_deleted,"total_changed"=>$total_changed,"missed_class"=>$missed_class,"total_clients"=>$total_clients,"numberofpaidinvoice"=>$numberofpaidinvoice,"transfer"=>$transfer,"fees"=>$fees,"total_remaining_hours"=>$total_remaining_hours,"upcoming_cls"=>$upcoming_cls,"total_cls"=>$total_cls,"qm"=>$qm,"qr"=>$qr,"al"=>$al,"is"=>$is]);
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
        foreach($result as $key=>$value){
            $result[$key]->time_to_contact = date("D, M d,Y",strtotime($value->time_to_contact));
        }
        
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
                        return;
                    }
                    return;
                
            }
            return 'Wrong Login Details.';
            
    
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
        $payment->name = ($type==1 ? $user->name : $user->name);
        $payment->email = ($type==1 ? $user->email : $user->email);
    	$payment->save();
    	
    	
    	 $notification = new notification;
    $notification->user ="Admin";
    $notification->content = $user->name." has made a new payment.";
    date_default_timezone_set(Auth::user()->timezone);
    $notification->time = date("D, M d,Y h:ia");
    $notification->read = 0;
    $notification->save();
    
    
    	return back()->with("success",__("Successfully added the payment."));

    }
    public function get_payment(Request $request){


// functions for the admin to manage class

        $search = $request->get("search");
        $and = "payments WHERE (date LIKE '%$search%' OR invoice LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%')";
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
            $result[$key]->created_at = date("D, M d,Y h:i a",strtotime($value->created_at));
            
            
            
        	$data = [];
        	if ($value->type=="Student") {
            if ($user_name = User::find($value->user)) {
        	$data[0] = $user_name->name;
        	$data[1] = $user_name->email;
            }else{
            $data[0] = 'User Deleted';
            $data[1] ='User Deleted';
            }
        	}else{
        	if ($user_name = client::where("key","=",$value->user)->first()){
        	$data[0] = $user_name->name;
        	$data[1] = $user_name->email;
            }else{
            $data[0] = 'User Deleted';
            $data[1] ='User Deleted';
            }
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
        if (!empty($last_payment_date)) {
        $last_payment = date("D, M d,Y",strtotime($last_payment_date[0]->date) + 3600*24*30);
        $dt = $last_payment_date[0]->date;
        }else{
            $dt = "Not Yet";
            $last_payment = date("D, M d,Y");
        }
        
    	return view("my_class",["attend"=>[count($attend), count($attends)],"not_attended"=>[count($not_attended), count($not_attendeds)],"last_payment"=>[$dt,$last_payment]]);
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
    // functions for the admin
    function student_list(Request $request)
    {
        $search = $request->get("search");
        $order = $request->get("order");
        $and = '';
                $members = $this->get_family_members(Auth::id());
        $mem_script = "(";
        $i = 1;
        foreach ($members as $key => $value) {
            $mem_script.=" id='".$value."'";
            if ($i!=count($members)) {
                $mem_script.=" OR ";
            }
            $i++;
        }
        $mem_script.= ") ";


        if ($order == 0)
        {
            $and = "users WHERE (name LIKE '%$search%' OR country LIKE '%$search%') AND type!=3";
        }
        if ($order == 1)
        {
            $and = "users WHERE (name LIKE '%$search%' OR country LIKE '%$search%') AND $mem_script";
        }
        if ($order == 2)
        {
            $and = "users WHERE (name LIKE '%$search%' OR country LIKE '%$search%') AND type=1";
        }
        // $page = 1;
        $page = $request->get("page");
        $limit = 30;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN phone LIKE '___________$search%' THEN 12 END, name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN phone LIKE '___________$search%' THEN 12 END, name ASC;
            ");
        return json_encode([$result, [count($total) , $page, $limit]]);
    }


    public function awgafasdfew(Request $request)
    {
$members = $this->get_family_members(Auth::id());
        $mem_script = "(";
        $i = 1;
        foreach ($members as $key => $value) {
            $mem_script.=" s_id='".$value."'";
            if ($i!=count($members)) {
                $mem_script.=" OR ";
            }
            $i++;

        }
        $mem_script.= ") ";



        $class = DB::select("select * from courses WHERE $mem_script");

            $data = [];
            $crt = time();
            $mxt = time() + 3600 * 24 * 30;
            foreach ($class as $key => $value)
            {
            date_default_timezone_set($value->timezone);
                 // add the changes
                if ($value->repeat == '')
                {
                    $nst =  date("Y-m-d H:i:s",  strtotime($value->starting));
                            // date_default_timezone_set($value->timezone);
                            $mst = strtotime($nst);

                    $change = change::where([["class_id", "=", $value->ras], ["replacetime", "=", $mst ]])->orderBy("id","desc")
                        ->first();
                    if ($change)
                    {
                        if ($change->status != '0')
                        {
                            if ($change->app > $crt && $change->app < $mxt)
                            {
                                date_default_timezone_set($change->timezone);
                                    $nod = date("Y-m-d H:i:s",$change->app);
                                    // date_default_timezone_set(Auth::user()->timezone);
                                    $change->app = strtotime($nod);
                                        
                                date_default_timezone_set(Auth::user()->timezone);
                                    array_push($data, [$change->app, date("D, M d,Y h:i a", $change->app) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mxt]);
                            }
                        }
                    }
                    else
                    {

                            // date_default_timezone_set($value->timezone);
                                $ntr = date("Y-m-d H:i:s",strtotime($value->starting));
                                $nxt = strtotime($ntr);
                                if ($nxt>$crt) {
                                date_default_timezone_set(Auth::user()->timezone);
                            array_push($data, [$nxt , date("D, M d,Y h:i a", $nxt) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst ]);
                                }
                        }
                    
                }
                else
                {
                    $repeat = explode(",", $value->repeat);
                    $nxt = empty($value->lastclass) ? (strtotime($value->starting)) : (strtotime($value->lastclass) + 24 * 3600);
                    while (true)
                    {
                        if ($nxt > $mxt)
                        {
                            break;
                        }
                        if (in_array(date("l", $nxt) , $repeat))
                        {
                            $nst =  date("Y-m-d H:i:s", $nxt);
                            // date_default_timezone_set($value->timezone);
                            $mst = strtotime($nst);
                            // date_default_timezone_set(Auth::user()->timezone);
                            $change = change::where([["class_id", "=", $value->ras], ["replacetime", "=", $mst]])->orderBy("id","desc")->first();
                            if ($change)
                            {
                                if ($change->status != '0' && $change->app>$crt)
                                {
                                
                                    // date_default_timezone_set($change->timezone);
                                    $nod = date("Y-m-d H:i:s",$change->app);
                                    // date_default_timezone_set(Auth::user()->timezone);
                                    $change->app = strtotime($nod);
                                    // date_default_timezone_set($change->timezone);
                                date_default_timezone_set(Auth::user()->timezone);

                                    array_push($data, [$change->app, date("D, M d,Y h:i a", $change->app) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst]);
                                }
                            }
                            else
                            {
                                if( $nxt>$crt){
                                date_default_timezone_set(Auth::user()->timezone);
                                array_push($data, [$nxt, date("D, M d,Y h:i a", $nxt) ,$value->subject , $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst]);
                                }
                            }
                            $nxt += 24 * 3600;
                        }
                        else
                        {
                            $nxt += 24 * 3600;
                        }
                    }
                }
            }


            usort($data, function ($a, $b)
            {
                return $a[0] > $b[0] ? 1 : -1;
            });
    return json_encode([$data, Auth::user()->type]);
    }


    public function laod_class(Request $request)
    {
        if (Auth::user()->type==1) {
        $class = course::where("t_id", "=", Auth::id())->get();
        }else{
        $class = course::where("s_id", "=",  Auth::id())->get();

        }
            $data = [];
            $crt = time();
            $mxt = time() + 3600 * 24 * 30;
            foreach ($class as $key => $value)
            {
            date_default_timezone_set($value->timezone);
                 // add the changes
                if ($value->repeat == '')
                {
                    $nst =  date("Y-m-d H:i:s",  strtotime($value->starting));
                            // date_default_timezone_set($value->timezone);
                            $mst = strtotime($nst);

                    $change = change::where([["class_id", "=", $value->ras], ["replacetime", "=", $mst ]])->orderBy("id","desc")
                        ->first();
                    if ($change)
                    {
                        if ($change->status != '0')
                        {
                            if ($change->app > $crt && $change->app < $mxt)
                            {
                                date_default_timezone_set($change->timezone);
                                    $nod = date("Y-m-d H:i:s",$change->app);
                                    // date_default_timezone_set(Auth::user()->timezone);
                                    $change->app = strtotime($nod);
                                        
                                date_default_timezone_set(Auth::user()->timezone);
                                    array_push($data, [$change->app, date("D, M d,Y h:i a", $change->app) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mxt]);
                            }
                        }
                    }
                    else
                    {

                            // date_default_timezone_set($value->timezone);
                                $ntr = date("Y-m-d H:i:s",strtotime($value->starting));
                                $nxt = strtotime($ntr);
                                if ($nxt>$crt) {
                                date_default_timezone_set(Auth::user()->timezone);
                            array_push($data, [$nxt , date("D, M d,Y h:i a", $nxt) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst ]);
                                }
                        }
                    
                }
                else
                {
                    $repeat = explode(",", $value->repeat);
                    $nxt = empty($value->lastclass) ? (strtotime($value->starting)) : (strtotime($value->lastclass) + 24 * 3600);
                    while (true)
                    {
                        if ($nxt > $mxt)
                        {
                            break;
                        }
                        if (in_array(date("l", $nxt) , $repeat))
                        {
                            $nst =  date("Y-m-d H:i:s", $nxt);
                            // date_default_timezone_set($value->timezone);
                            $mst = strtotime($nst);
                            // date_default_timezone_set(Auth::user()->timezone);
                            $change = change::where([["class_id", "=", $value->ras], ["replacetime", "=", $mst]])->orderBy("id","desc")->first();
                            if ($change)
                            {
                                if ($change->status != '0' && $change->app>$crt)
                                {
                                
                                    // date_default_timezone_set($change->timezone);
                                    $nod = date("Y-m-d H:i:s",$change->app);
                                    // date_default_timezone_set(Auth::user()->timezone);
                                    $change->app = strtotime($nod);
                                    // date_default_timezone_set($change->timezone);
                                date_default_timezone_set(Auth::user()->timezone);

                                    array_push($data, [$change->app, date("D, M d,Y h:i a", $change->app) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst]);
                                }
                            }
                            else
                            {
                                if( $nxt>$crt){
                                date_default_timezone_set(Auth::user()->timezone);
                                array_push($data, [$nxt, date("D, M d,Y h:i a", $nxt) ,$value->subject , $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst]);
                                }
                            }
                            $nxt += 24 * 3600;
                        }
                        else
                        {
                            $nxt += 24 * 3600;
                        }
                    }
                }
            }


            usort($data, function ($a, $b)
            {
                return $a[0] > $b[0] ? 1 : -1;
            });
    return json_encode([$data, Auth::user()->type]);
    }

    public function manage_class(){
        return view("manage_class");
    }
    public function allpreclass(){
        return view("allpreclass");
    }
    public function get_family_members($id){
        $client = User::find($id)->gurdain_id;
        $users = [];
        if ($client=='') {
            array_push($users, $id);
            return $users;
        }else{
            $user = User::where("gurdain_id","=",$client)->get();
            foreach($user as $u){
                array_push($users, $u->id);
            }
            return $users;
        }
    }
    public function allclass(){
        $me = Auth::id();
        $m = date("m");
        $y = date("Y");
        $members = $this->get_family_members(Auth::id());
        $mem_script = "(";
        $i = 1;
        foreach ($members as $key => $value) {
            $mem_script.=" s_id='".$value."'";
            if ($i!=count($members)) {
                $mem_script.=" OR ";
            }
            $i++;
        }
        $mem_script.= ") AND ";


        $asofhnweo = "(";
        $i = 1;
        foreach ($members as $key => $value) {
            $asofhnweo.=" user='".$value."'";
            if ($i!=count($members)) {
                $asofhnweo.=" OR ";
            }
            $i++;

        }
        $asofhnweo.= ") AND ";
        $attend = DB::select("SELECT * FROM reports WHERE $mem_script  guest=1");
        $attends = DB::select("SELECT * FROM reports WHERE $mem_script guest=1 AND month(`starting`)='$m' AND year(`starting`)='$y'");
        $not_attended = DB::select("SELECT * FROM reports WHERE $mem_script  guest=0");
        $not_attendeds = DB::select("SELECT * FROM reports WHERE $mem_script  guest=0 AND month(`starting`)='$m' AND year(`starting`)='$y'");
        $last_payment_date = DB::select("SELECT * FROM payments WHERE $asofhnweo type='Student' ORDER BY id DESC LIMIT 1");
        if (!empty($last_payment_date)) {
        $last_payment = date("D, M d,Y",strtotime($last_payment_date[0]->date) + 3600*24*30);
        $dt = $last_payment_date[0]->date;
        }else{
            $dt = "Not Yet";
            $last_payment = date("D, M d,Y");
        }
        
        return view("allclass",["attend"=>[count($attend), count($attends)],"not_attended"=>[count($not_attended), count($not_attendeds)],"last_payment"=>[$dt,$last_payment]]);
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
        $result = DB::select("SELECT * FROM ".$and." ORDER BY `lastclass` DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY `lastclass` DESC;
            ");
        $starting_time = [];
        $status = [];
        foreach ($result as $key => $value) {
            $result[$key]->repeat = substr($value->repeat, 1);
            date_default_timezone_set($value->timezone);
            $pre_v = strtotime($value->lastclass);
            $sql = "SELECT * FROM reports WHERE ras='$value->ras' AND id<$value->id";
            $res = count(DB::select($sql));
            date_default_timezone_set(Auth::user()->timezone);
            array_push($starting_time, [date("D, M d,Y h:ia", $pre_v), (($res)+1),Auth::user()->type,Date("D, M d,Y h:ia", strtotime($value->lastclass)+(3600*36))]);   
        }
    return json_encode([$result,[count($total), $page, $limit],$starting_time]);
    }

    public function reportstseet(Request $request){
        $search = $request->get("search");

        $members = $this->get_family_members(Auth::id());
        $mem_script = "(";
        $i = 1;
        foreach ($members as $key => $value) {
            $mem_script.=" s_id='".$value."'";
            if ($i!=count($members)) {
                $mem_script.=" OR ";
            }
            $i++;
        }
        $mem_script.= ") ";


        if (Auth::user()->type==2) {
        $and = "reports WHERE (title LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%' OR ras LIKE '%$search%') AND $mem_script";
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
            array_push($starting_time, [date("D, M d,Y h:ia", $pre_v), (($res)+1),Auth::user()->type,Date("D, M d,Y h:ia", strtotime($value->starting)+(3600*36))]);   
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
        
        date_default_timezone_set($result->timezone);
        if((time()-strtotime($result->lastclass))<(3600*36)){
        return view("note_upload",["report"=>$id,"d"=>0]);
    }else{
        return view("note_upload",["report"=>$id,"d"=>1]);
    }
}
}
}
