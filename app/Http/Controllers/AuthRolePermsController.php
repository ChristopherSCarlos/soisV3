<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Objects;

// use Auth;

class AuthRolePermsController extends Controller
{
    public $role;
    public $userId;
    public $userData;
    public $userRole;
    private $object;

    public $user_id;
    private $user_role;

    public function index()
    {
            $this->object = new Objects();
            $this->userRole = $this->object->roles();
            // echo $this->userRole;
            $this->user_id = Auth::id();
            $this->userData = User::find($this->user_id);
            // echo $this->userData;
            $this->userRole = $this->userData->roles->first();
            $this->user_role = $this->userRole->role;
            // echo $this->user_role;


        if(Auth::check()){
            if($this->userRole == 'Super Admin'){
                return redirect('/default-interfaces');
            }elseif ($this->userRole == 'Home Page Admin') {
                return redirect('/Organization/dashboard');
            }else{
                echo "User";
            }
            dd("break");


        }else{
            return redirect('/login');
        }
    }
}
