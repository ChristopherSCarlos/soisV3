<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Objects;

use Auth;
use Illuminate\Support\Facades\DB;

class AdminNavBars extends Component
{
    public $role;
    public $userId;
    public $userData;
    public $userRole;

    private $object;

    public function getUserData()
    {
        $this->object = new Objects();
        $this->userRole = $this->object->roles();
        // dd($this->userRole->role);
        return $this->userRole->role; 
    }
    public function logoutControll()
    {
        $this->userId = Auth::id();
        // dd(DB::table('sois_gates')->where('user_id','=',$this->userId)->get());
        DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['is_logged_in' => '0']);
        // dd("Hello");
    }
    public function render()
    {
        return view('livewire.admin-nav-bars',[
            'getUserRole' => $this->getUserData(),
        ]);
    }
}
