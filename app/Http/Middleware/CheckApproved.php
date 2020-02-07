<?php

namespace App\Http\Middleware;

use Closure;

class CheckApproved {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!auth()->user()->approved_at) {
            $email = auth()->user()->email;
            return redirect()->route('admin.approve' , $email);
        }
        return $next($request);
    }

}
