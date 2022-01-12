<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeletedAnnouncementsButtons extends Component
{
    public function back()
    {
        return redirect('/announcements');
    }

    public function render()
    {
        return view('livewire.deleted-announcements-buttons');
    }
}