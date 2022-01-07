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

    public function __construct(Request $request){
        $minutes = 1;
        $response = new Response('Hello World');
        // $cookie = Cookie::forever('name', 'virat');
        // $response->withCookie($cookie);
    }

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
            // dd($this->user_role);
            // echo $this->user_role;
        if(Auth::check()){
            if($this->user_role == 'Super Admin'){

                // $minutes = 1;
                // $response = new Response('Hello World');
                // $response->withCookie(cookie('name', 'virat', $minutes));

                // return $response;
                return redirect('/default-interfaces');
            }elseif ($this->user_role == 'Home Page Admin') {
                // dd($this->user_role);
                // $minutes = 1;
                // $response = new Response('Hello World');
                // $response->withCookie(cookie('name', 'virat', $minutes));
                // return $response;
                return redirect('/Organization/dashboard');
            }else{
                echo "User";
            }
            // dd("break");
        // dd("Hello");
        }else{
            // echo Auth::id();
            // echo "\n";
            // echo 1;
            // echo "\n";
            // echo User::find(11); 
            // dd(User::find(11));
            // dd("notlogin");
            // return redirect('/dashboard');
            return redirect('/login');
        }
    }
}
