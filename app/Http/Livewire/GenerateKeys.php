<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GenerateKeys extends Component
{

    public function generateKey()
    {
        
        // $n=10;
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $randomString = '';
        // for ($i = 0; $i < $n; $i++) {
        //     $index = rand(0, strlen($characters) - 1);
        //     $randomString .= $characters[$index];
        // }
        // // return $randomString;
        // echo $randomString;
    
        dd("Hello");
    }

    public function render()
    {
        return view('livewire.generate-keys');
    }
}
