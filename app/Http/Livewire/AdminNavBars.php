<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;

class AdminNavBars extends Component
{
    public $role;
    public $userId;
    public $userData;
    public $userRole;

    public function getUserData()
    {

            $this->userId = Auth::id();
            $this->userData = User::find($this->userId);

            $this->role = $this->userData->roles->first();
            $this->userRole = $this->role->role_name;
            return $this->userRole; 
            // dd($this->userRole);
        


    }

    public function render()
    {
        return view('livewire.admin-nav-bars',[
            'getUserRole' => $this->getUserData(),
        ]);
    }
}
