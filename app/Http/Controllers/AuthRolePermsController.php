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

    public function index()
    {
        if(Auth::check()){
            $this->object = new Objects();
            $this->userRole = $this->object->roles();
            if($this->userRole == 'Super Admin'){
                return redirect('/dashboard');
            }elseif ($this->userRole == 'Organization Admin') {
                return redirect('/Organization/dashboard');
            }else{
                echo "User";
            }
            dd("break");


        }else{
            echo 'world';
        }
    }
}
