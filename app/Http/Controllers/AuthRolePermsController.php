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
    public $userRoleData;
    public $user_id;
    private $user_role;
    private $user_role_Data;
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
            // dd(DB::table('role_user')->where('user_id','=',$this->user_id)->first());
            // dd($this->userData);
            $this->userRoleData = DB::table('role_user')->where('user_id','=',$this->user_id)->first();
            $this->userRole = $this->userRoleData->role_id;
            if(Auth::check()){
                // dd(DB::table('roles')->where('role_id','=',$this->userRole)->first());
                // echo $this->userRole->role;
                // echo "<br><br>";

                $this->user_role_Data = DB::table('roles')->where('role_id','=',$this->userRole)->first();
                // dd($this->user_role_Data);
                $this->user_role = $this->user_role_Data->role;
                // dd($this->user_role);
                // $this->user_role_count = $this->userRole->role;
                if ($this->user_role) {
                    echo "Esixt";
                    echo "<br><br>";
                    if($this->user_role == 'Super Admin'){
                        // DB::table('sois_gates')->where('user_id','=',Auth::id())->update(['gate_key' => Str::uuid()]);
                        echo $this->user_role;

                        echo "<br><br>";
                        return redirect('/default-interfaces');
                        // dd("Super Admin");
                    }
                    elseif($this->user_role == 'Head of Student Affairs'){
                        echo $this->user_role;
                        echo "<br><br>";
                        // dd("Head of student affairs");
                        return redirect('/admin-default-interfaces');
                    }elseif($this->user_role != 'Super Admin' || $this->user_role != 'Head of Student Affairs' || $this->user_role != 'User' ){
                        echo $this->user_role;
                        echo "<br><br>";
                        echo "Not Suer admin";
                        // dd("HomepageAdmin");
                        return redirect('/Organization/dashboard');
                    }elseif($this->user_role == 'User'){
                        echo "User";
                        echo "<br><br>";
                        dd("HomepageAdmin");
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
