<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Illuminate\Support\Facades\DB;
class SoisGates extends Component
{

    public $hello;
    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();

        // echo User::find($this->userId);
        DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['is_logged_in' => '1']);
    }

    public function test()
    {
        $this->hello = 'https://www.youtube.com/'.'asdasdasdasdasdasda'; 
        return $this->hello;
    }

    public function render()
    {
        return view('livewire.sois-gates',[
            'test' => $this->test(),
        ]);
    }
}
