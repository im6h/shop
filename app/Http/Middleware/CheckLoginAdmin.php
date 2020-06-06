<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
{
    
    public function handle($request, Closure $next)
    {
    	if (!get_data_user('admins')) 
    	{
    		return redirect()->route('admin.login');
    	}
        return $next($request);
    }
}
