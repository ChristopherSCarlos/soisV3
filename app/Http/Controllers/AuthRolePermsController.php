<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Objects;

// use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\STR;

class AuthRolePermsController extends Controller
{
    public $role;
    public $userId;
    public $userData;
    public $userRole;
    public $user_id;
    private $user_role;
    private $object;
    private $user_role_count;

    public function index()
    {
            $this->object = new Objects();
            $this->userRole = $this->object->roles();
            // echo $this->userRole;
            $this->user_id = Auth::id();
            $this->userData = User::find($this->user_id);
            // echo $this->userData;
            $this->userRole = $this->userData->roles->first();

            if(Auth::check()){
                echo $this->userRole->role;
                echo "<br><br>";
                $this->user_role_count = $this->userRole->role;
                if ($this->userRole->role) {
                    echo "Esixt";
                    echo "<br><br>";
                    if($this->userRole->role == 'Super Admin'){
                        DB::table('sois_gates')->where('user_id','=',Auth::id())->update(['gate_key' => Str::uuid()]);
                        echo "<br><br>";
                        // return redirect('/default-interfaces');
                    }elseif($this->userRole->role != 'Super Admin' || $this->userRole->role != 'User' ){
                        echo $this->userRole->role;
                        echo "<br><br>";
                        // dd("HomepageAdmin");
                        return redirect('/Organization/dashboard');
                    }elseif($this->userRole->role == 'User'){
                        echo "User";
                        echo "<br><br>";
                        // dd("User");
                        // return redirect('/Organization/dashboard');
                        Auth::logout();
                        return redirect('/login');
                    }
                    // dd("hello");
                }else{
                    echo 'do not extends;';
                    Auth::logout();
                    return redirect('/login');
                }
            }else{
                // echo "Helo";
                // return redirect('/login');
            }
    }
}
