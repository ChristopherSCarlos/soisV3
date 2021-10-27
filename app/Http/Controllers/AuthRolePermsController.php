<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Auth;

class AuthRolePermsController extends Controller
{
    public $role;
    public $userId;
    public $userData;

    public function index()
    {
        if(Auth::check()){
            // echo "Hello";
            $this->userId = Auth::id();
            $this->userData = User::find($this->userId);
            // dd($this->userData);

            $this->role = $this->userData->roles->first();
            // dd($this->role->role_name);
            if($this->role->role_name == 'Super Admin'){
                echo 'Super';
                return redirect('/dashboard');
            }elseif ($this->role->role_name == 'Organization Admin') {
                echo "Organization";
                return redirect('/Organization/dashboard');
            }else{
                echo "User";
            }
            dd("break");


        }else{
            echo 'world';
        }
            dd("Hello");
    }
}
