<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Auth;

class isUserLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;
    protected $userData;
    protected $role;
    protected $userId;
    public function handle(Request $request, Closure $next)
    {
        $this->userId = Auth::id();

        DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['is_logged_in' => '1']);
        return $next($request);
    }
}
