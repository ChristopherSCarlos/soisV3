<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeletedArticlesButtons extends Component
{
    public function back()
    {
        return redirect('/articles');
    }

    public function render()
    {
        return view('livewire.deleted-articles-buttons');
    }
}
