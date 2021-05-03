<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\course;
use App\Models\notification;
use App\Models\client;
use App\Http\Controllers\mainct;
use App\Models\payment;
use App\Models\report;
use App\Mail\email;

class student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // ,Friday,Saturday,Thursday



    public function handle(Request $request, Closure $next)
    {
        $tz = date_default_timezone_get();
       if (Auth::user()->type==2) {

        $classes = course::where("s_id","=",Auth::id())->get();
        foreach ($classes as $key => $class) {
            date_default_timezone_set($class->timezone);
                $starting_date = $class->starting;
            if ($class->repeat=='') {
                if ((strtotime($starting_date))==(strtotime($class->lastclass))) {
                    continue;
                }
                $starting_in = (strtotime($starting_date))-time();
                // dd($starting_in);
                if($starting_in<0){
        
$st_dt = User::find($class->s_id);
if($st_dt->key==1){
    $class->lastclass = $upcoming_class;
$class->save();
    break;
}
$hours = $st_dt->hours;
$class_time = $class->duration;
$now_t = intval($hours) - intval($class_time);

$st_dt->hours = $now_t;
$st_dt->save();

if ($st_dt->hours<1 OR $st_dt->hours=='') {
    mainct::send($st_dt->id,"You have ".$st_dt->hours." minutes in your account. You should Purchase hour now.");
    mainct::send("Admin",$st_dt->name." has ".$st_dt->hours." minutes remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
    mainct::send($class->t_id,$st_dt->name." has ".$st_dt->hours." minutes remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
}
if ($st_dt->hours==0 OR $st_dt->hours=='') {
    mainct::send("Admin",$st_dt->name." has ".$st_dt->hours." minutes remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
    mainct::send($class->t_id,$st_dt->name." has ".$st_dt->hours." minutes remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
    $status = 0;
}else{
    $status = 1;
}
                    $report = new report;
$report->title=$class->title;
$report->description=$class->description;
$report->subject=$class->subject;
$report->ras=$class->ras;
$report->link=$class->link;
$report->duration=$class->duration;
$report->timezone=$class->timezone;
$report->starting=$class->starting;
$report->teacher=$class->teacher;
$report->student=$class->student;
$report->t_id=$class->t_id;
$report->s_id=$class->s_id;
$report->guest=0;
$report->guest_active=0;
$report->repeat='';
$report->status=$status;
$report->notes='';
$report->assignment='';
$report->lastclass=$class->starting;
$report->save();

$class->lastclass = $class->starting;
$class->save();
                }
            }


// if class repeat is != ''
else{
    $lastclass = $class->lastclass;
    if (!empty($lastclass)) {
        $last_class = strtotime($lastclass);
        $repeat = explode(",", $class->repeat);
        $upcoming_class = '';

// make lst_c
        $a1 = date("Y-m-d", strtotime($lastclass));
        $a2 = date("H:i:s", strtotime($class->starting));
        $a3 = strtotime($a1." ".$a2);


        $lst_c = $a3 + 86400;
        while (true) {
        $next_class = date("l",$lst_c);
            if(in_array($next_class, $repeat)){
                $upcoming_class = date("Y-m-d H:i:s", $lst_c);
                break;
            }else{
                $lst_c += 86400;
                $next_class = date("l",$lst_c);
            }
        }        
    }else{
        $upcoming_class = $class->starting;
    }
    if (strtotime($upcoming_class) < time()) {
        
$st_dt = User::find($class->s_id);
if($st_dt->key==1){
    $class->lastclass = $upcoming_class;
$class->save();
    break;
}
$hours = $st_dt->hours;
$class_time = $class->duration;
$now_t = intval($hours) - intval($class_time);

$st_dt->hours = $now_t;
$st_dt->save();


if ($st_dt->hours<1 OR $st_dt->hours=='') {
    mainct::send($st_dt->id,"You have ".$st_dt->hours." in your account. You should Purchase hour now.");
    mainct::send("Admin",$st_dt->name." has ".$st_dt->hours." remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
    mainct::send($class->t_id,$st_dt->name." has ".$st_dt->hours." remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
}
if ($st_dt->hours==0 OR $st_dt->hours=='') {
    mainct::send("Admin",$st_dt->name." has ".$st_dt->hours." remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
    mainct::send($class->t_id,$st_dt->name." has ".$st_dt->hours." remaining. You can contact him by ".$st_dt->email." or ". $st_dt->phone);
    $status = 0;
}else{
    $status = 1;
}
$report = new report;
$report->title=$class->title;
$report->description=$class->description;
$report->subject=$class->subject;
$report->ras=$class->ras;
$report->link=$class->link;
$report->duration=$class->duration;
$report->timezone=$class->timezone;
$report->starting=$class->starting;
$report->teacher=$class->teacher;
$report->student=$class->student;
$report->t_id=$class->t_id;
$report->s_id=$class->s_id;
$report->guest=0;
$report->guest_active=0;
$report->repeat=$class->repeat;
$report->status=$status;
$report->notes='';
$report->assignment='';
$report->lastclass=$upcoming_class;
$report->save();

$class->lastclass = $upcoming_class;
$class->save();



    }
}



        }
            date_default_timezone_set($tz);

        return $next($request);
        }
        else{
            return back();
        }
    }
}
