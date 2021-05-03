<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use App;
use Illuminate\Http\Request;

class language
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
        $lang = "en";
        if (Auth::check()) {
            if(isset($_COOKIE['language'])){
                $lang = $_COOKIE['language'];
                $user = User::find(Auth::id());
                $user->language=$_COOKIE['language'];
                $user->save();
                $lang = $_COOKIE['language'];
            }else{
                setcookie("language", Auth::user()->language, time() + (86400 * 30 *365), "/");
                $lang = Auth::user()->language;
            }
        }else{
            if(isset($_COOKIE['language'])){
                $lang = $_COOKIE['language'];
            }
        }
        App::setlocale($lang);
        return $next($request);
    }
}
