<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 

class validUser
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        //dd('Middleware Chal Gaya!');
        echo "<h3 class='text-primary'>we are now . $role .in Valid User middle ware</h3>";
        
        // if (Auth::check() && Auth::user()->role == $role)
        //     {
        //      return $next($request);// jab user check ho jaye ga toh wo next chala jaye ga.
        //     }
        //     elseif (Auth::check() && Auth::user()->role =="user")
        //     {
        //     return redirect ()->route('user');
        //     }
        //     else {              
        //   return redirect()->route('login');     
        //   }
            
    }
}
