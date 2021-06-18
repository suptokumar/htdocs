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
use App\Models\change;
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
       if (Auth::user()->type==2) {


            date_default_timezone_set('Africa/Cairo');
        $class = course::get();
            $data = [];
            $crt = time()-24*3600*20;
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
                    if(!empty($value->lastclass)){
                        continue;
                    }
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
                                        
                                date_default_timezone_set("Africa/Cairo");
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
                                date_default_timezone_set("Africa/Cairo");
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
                                date_default_timezone_set("Africa/Cairo");

                                    array_push($data, [$change->app, date("D, M d,Y h:i a", $change->app) , $value->subject, $value->link, $value->duration, User::find($value->t_id)->name, User::find($value->s_id)->name,$value,$mst]);
                                }
                            }
                            else
                            {
                                if( $nxt>$crt){
                                date_default_timezone_set("Africa/Cairo");
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

            for ($i=0; $i < count($data); $i++) { 
                
            $starting_in = empty($data[$i])?545445454:$data[$i][0]-time();
                if($starting_in<0){
        $class = $data[$i][7];


$status = 1;

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
$report->lastclass=date("Y-m-d H:i:s",$data[$i][0]);
$report->save();

$class->lastclass = date("Y-m-d H:i:s",$data[$i][0]);
$class->save();
            }
                }










date_default_timezone_set(Auth::user()->timezone);

         return $next($request);
        }
        else{
            return back();
        }
    }
}
