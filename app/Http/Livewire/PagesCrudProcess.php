<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PagesCrudProcess extends Component
{
    public function returnSystemPageMenu()
    {
        return redirect('/pages');
    }
    public function render()
    {
        return view('livewire.pages-crud-process');
    }
}
