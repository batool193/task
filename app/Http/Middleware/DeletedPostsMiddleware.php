<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeletedPostsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {
            if ((Auth::user()->roles()->where('role_id', '=', 1)->first()) == null) {
                return $next($request);
            } else
           return redirect()->route('getposts', ['trashed' => 'post']);


                 return $next($request);
        }

    else
    {
        return redirect('login');
    }    }
}
