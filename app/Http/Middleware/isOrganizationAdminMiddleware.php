<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class isOrganizationAdminMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    protected $userData;
    protected $role;
    protected $roleData;
    protected $role_user_data;
    protected $userId;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->hello = "hello";
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // echo "Hello";
        $this->userId = Auth::id();
        $this->userData = User::find($this->userId);
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->first());
        $this->role_user_data = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd($this->role_user_data->role_id);
        $this->roleData = DB::table('roles')->where('role_id','=',$this->role_user_data->role_id)->first();
        // dd($this->roleData->role);
        // dd(DB::table('roles')->where('role_id','=',$this->role_user_data->role_id)->first());
        // $this->role = $this->userData->roles->first();
        // dd($this->role);
        // dd($this->role->role);


        if ($this->roleData->role !== "Super Admin" || $this->roleData->role !== "User") {
            return $next($request);
        }else{
            abort(403, 'Unauthorized action.');
        }

    }
}