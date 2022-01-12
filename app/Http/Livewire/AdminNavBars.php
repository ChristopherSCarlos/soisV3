<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Objects;

use Auth;

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
    public function render()
    {
        return view('livewire.admin-nav-bars',[
            'getUserRole' => $this->getUserData(),
        ]);
    }
}
