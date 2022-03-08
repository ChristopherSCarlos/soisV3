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
                
                $this->user_role_count = $this->userRole->role;
                if ($this->userRole->role) {
                    echo "Esixt";
                    if($this->userRole->role == 'Super Admin'){
                        echo "Super Admin";
                        return redirect('/default-interfaces');
                    }elseif($this->userRole->role == 'Home Page Admin'){
                        echo 'HomepageAdmin';
                        return redirect('/Organization/dashboard');
                    }else{
                        echo "User";
                        Auth::logout();
                        return redirect('/login');
                    }
                }else{
                    echo 'do not extends;';
                    Auth::logout();
                    return redirect('/login');
                }
            }else{
                echo "Helo";
                return redirect('/login');
            }
    }
}
