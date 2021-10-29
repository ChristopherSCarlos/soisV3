<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Livewire\Announcements;

use App\Models\User;
use Auth;

class Officers extends Component
{
    private $role;
    private $userRole;

    public $userId;
    public $userData;
    public $userOrganizationData;

    public function mount()
    {
        $this->role  = new Announcements();
        $this->userRole = $this->role->getAuthRoleUser();
    }

    public function org()
    {
        $this->userId = Auth::id();
        $this->userData = User::find($this->userId);
        // dd($this->userData->name);
        // dd($this->userData->organizations);
        // $this->userOrganizationData = $this->userData->organizations->get();
        // dd($this->userOrganizationData->organization_name);
    }


    public function FunctionName($value='')
    {
        // code...
    }

    public function render()
    {
        return view('livewire.officers',[
            'getOrgData' => $this->org(),
            'getAuthUserRole' => $this->userRole,
        ]);
    }
}
