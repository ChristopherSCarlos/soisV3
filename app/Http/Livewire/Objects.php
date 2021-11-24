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

    public function roles()
    {
        $this->user_id = Auth::id();
        $this->user_data = User::find($this->user_id); 
        $this->userData();
        $this->userRole = $this->userData()->roles->first();
        $this->user_role = $this->userRole->role_name;
        return $this->user_role;
    }
    public function userData()
    {
        $this->user_id = Auth::id();
        $this->user_data = User::find($this->user_id); 
        return $this->user_data;
    }

    public function userOrganization()
    {
        $this->user_id = Auth::id();
        $this->user = User::find($this->user_id);
        $this->va = $this->user->organizations->first();
        dd($this->va);
    }


    public function render()
    {
        return view('livewire.objects');
    }
}
