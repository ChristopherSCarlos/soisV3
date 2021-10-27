<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

use Auth;

class Dashboards extends Component
{

    public $userData;
    public $userName;

    public function getAuthUserDataFromDatabase()
    {
        $this->userData = Auth::user();
        // dd($this->userData->name);
        $this->userName = $this->userData->name;
    }

    public function render()
    {
        return view('livewire.dashboards',[
            'getAuthUser' => $this->getAuthUserDataFromDatabase(),
        ]);
    }
}
