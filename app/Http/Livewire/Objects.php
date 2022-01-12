<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

use Auth;

class Objects extends Component
{
    private $user_id;
    private $user_data;
    private $user_pivot_role;
    private $user_role;
    private $user;
    private $va;


    public $userData;
    public $userID;
    public $userPivot;
    public $userOrganizationID;

    public function roles()
    {
        $this->user_id = Auth::id();
        $this->user_data = User::find($this->user_id); 
        // $this->userData();
        // dd($this->user_data->roles);
        $this->userRole = $this->user_data->roles->first();
        // $this->user_role = $this->userRole->role;


        // dd($this->userRole->role);
        return $this->userRole;
    }
    public function userData()
    {
        $this->user_id = Auth::id();
        $this->user_data = User::find($this->user_id); 
        return $this->user_data;
    }

    public function userOrganization()
    {
        // $this->user_id = Auth::id();
        // $this->user = User::find($this->user_id);
        // $this->va = $this->user->organizations->first();
        // dd($this->va);
        $this->userID = Auth::id();
        // dd($this->userID);
        $this->userData = User::find($this->userID);
        $this->userPivot = $this->userData->organizations->first();
        $this->userOrganizationID = $this->userPivot->organizations_id;
        return $this->userOrganizationID;
    }


    public function render()
    {
        return view('livewire.objects');
    }
}
