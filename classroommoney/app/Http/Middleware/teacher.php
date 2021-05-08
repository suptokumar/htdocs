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
        if (Auth::user()->type==2) {
        return $next($request);
        }
        else{
            return back();
        }
    }
}
