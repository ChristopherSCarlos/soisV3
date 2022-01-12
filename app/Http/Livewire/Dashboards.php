<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Livewire\Objects;

use App\Models\User;

use Auth;

class Dashboards extends Component
{
    private $object;

    public $userData;
    public $userName;

    public function mount()
    {
        $this->object = new Objects;
        // $this->object->userData();
        $this->userData = $this->object->userData()->roles->first();
        // dd($this->object->userData()->roles);
        // dd($this->userData->role_name);
    }

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
