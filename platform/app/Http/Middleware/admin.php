<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\notification;
use App\Models\waiting;

class admin
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
        $date = date("Y-m-d");
        $wait = DB::select("SELECT * FROM waitings WHERE done!=1 AND time_to_contact='$date'");
        foreach($wait as $key => $value){
            $waiting = waiting::find($value->id);
            $waiting->done=1;
            $waiting->save();
            $noti = new notification;
            $noti->user='Admin';
            $noti->content = 'You have a member to contact today in the waiting list. Please check '. $value->student_info;
            $noti->read = 0;
            $noti->time = date("D, M d,Y h:i a");
            $noti->save();
            
        }
        if (Auth::user()->type==3) {
        return $next($request);
        }
        else{
            return redirect("/");
        }
    }
}
