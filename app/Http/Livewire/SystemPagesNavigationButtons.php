<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SystemPagesNavigationButtons extends Component
{
    public function systemPageCrud()
    {
        return redirect('/pages');
    }
    public function defaultHomeapge()
    {
        dd("Hello");
    }
    public function createSystemPage()
    {
        return redirect('/system-pages/create-system-page');
    }

    public function render()
    {
        return view('livewire.system-pages-navigation-buttons');
    }
}
