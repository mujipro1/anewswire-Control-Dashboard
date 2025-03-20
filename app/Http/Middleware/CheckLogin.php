<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class CheckLogin {
    public function handle(Request $request, Closure $next) {
        if (!session()->has('user_id')) {
            return redirect()->route('home')->withErrors('You must be logged in.');
        }
        return $next($request);
    }
}

