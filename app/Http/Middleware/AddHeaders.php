<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Applicaion;
class AddHeaders
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
        $response = $next($request);
        $response->header("Access-Control-Allow-Origin: http://sois2.puptaguigcs.net");
        $response->header("Access-Control-Allow-Credentials: true");
        $response->header("Access-Control-Allow-Methods: GET, POST");
        $response->header("Access-Control-Allow-Headers: Content-Type, *");
        return $next($request);
    }
}
