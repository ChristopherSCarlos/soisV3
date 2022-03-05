<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestLivewire extends Component
{

    public function test()
    {
        dd("contrller");
    }

    public function render()
    {
        return view('livewire.test-livewire',[
            'testcontorl' => $this->test(),
        ]);
    }
}
