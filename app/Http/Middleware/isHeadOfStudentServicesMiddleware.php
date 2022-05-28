<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;

class isHeadOfStudentServicesMiddleware
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
        $this->userId = Auth::id();
        // dd($this->userId);
        $this->userData = User::find($this->userId);
        // dd($this->userData);
        $this->roleUserData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->roleUserID = $this->roleUserData->role_id; 
        $this->roleData = DB::table('roles')->where('role_id','=',$this->roleUserID)->first();
        // dd($this->roleData->role);
        // $this->role = $this->userData->roles->first();
        // dd($this->role->role_name);


        if ($this->roleData->role !== "Head of Student Services") {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
