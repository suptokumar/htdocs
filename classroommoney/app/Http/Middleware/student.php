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
       if (Auth::user()->type==3) {
        return $next($request);
        }
        else{
            return back();
        }
    }
}
