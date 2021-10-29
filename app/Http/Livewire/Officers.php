<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Auth;

class Officers extends Component
{

    public $userId;
    public $userData;
    public $userOrganizationData;

    public function org()
    {
        $this->userId = Auth::id();
        $this->userData = User::find($this->userId);
        
        $this->userOrganizationData = $this->userData->organizations->first();
        // dd($this->userOrganizationData->organization_name);


        // dd($this->userData);
    }

    public function render()
    {
        return view('livewire.officers',[
            'getOrgData' => $this->org(),
        ]);
    }
}
