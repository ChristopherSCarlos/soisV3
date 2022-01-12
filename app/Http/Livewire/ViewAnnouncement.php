<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewAnnouncement extends Component
{

    public function URLRedirector($announcement_id)
    {
        return view('admin.view-selected-announcements');
    }
    public function render()
    {
        return view('livewire.view-announcement');
    }
}
