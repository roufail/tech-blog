<?php

namespace App\Http\Middleware\Admin;

use Closure;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth('admin')->user()->approved != "Approved"){
            auth('admin')->logout();
            return redirect()->route('admin.login')->with(['not_approved_message' => 'Your account not approved']);
        }
        return $next($request);
    }
}
