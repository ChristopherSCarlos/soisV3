<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;

class isSuperAdminMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    protected $userData;
    protected $role;
    protected $userId;
    protected $newTime;
    protected $currentTime;
    protected $dbTime;
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
        // dd(Auth::id());
        $this->userId = Auth::id();

        $this->userData = User::find($this->userId);
        // dd($this->userData->role);
        $this->role = $this->userData->roles->first();
        // dd($this->role->role);


        if ($this->role->role !== "Super Admin") {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}