<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeletedUsersButtons extends Component
{
    public function back()
    {
        return redirect('/users');
    }

    public function render()
    {
        return view('livewire.deleted-users-buttons');
    }
}