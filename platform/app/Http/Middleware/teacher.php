<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\mainct;

use App\Models\User;
use App\Models\course;
use App\Models\notification;
use App\Models\client;
use App\Models\payment;
use App\Models\report;
use App\Mail\email;
use App\Models\change;

class teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
        if (Auth::user()->type==1) {
        $class = course::where("t_id", "=", Auth::id())->get();
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
                    $nxt = strtotime(empty($value->lastclass) ? $value->starting : $value->lastclass) + 24 * 3600;
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

            $starting_in = empty($data[0])?545445454:$data[0][0]-time();
            // dd($starting_in);
                if($starting_in<0){
        $class = $data[0][7];
$st_dt = User::find($class->s_id);
if($st_dt->key==1){
    $class->lastclass = $upcoming_class;
$class->save();
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
date_default_timezone_set($class->timezone);
$report->lastclass=date("Y-m-d H:i:s",$data[0][0]);
$report->save();

$class->lastclass = date("Y-m-d H:i:s",$data[0][0]);
$class->save();
                }

         return $next($request);
        }
        else{
            return back();
        }
    }
}
