<?php

namespace Sagor110090\Permission;

use Closure;

class IsAdmin
{

    public function handle($request, Closure $next)
    {
        if(auth()->user()->role=='Super Admin') {
            return $next($request);
        }
        return redirect()->back();
    }
}
