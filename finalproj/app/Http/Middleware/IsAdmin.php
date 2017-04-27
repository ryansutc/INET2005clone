<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 12/4/16
 * Time: 11:59 AM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    //http://stackoverflow.com/questions/36039931/laravel-5-2-admin-dashboard
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) { //check the proper role
            return $next($request);
        }
        else {
            return redirect('noaccess');
        }
    }
}