<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Illuminate\Support\Facades\DB;
class SoisGates extends Component
{

    public $sois2;
    public $gpoa;
    public $membership;
    public $soisar;
    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();

        // echo User::find($this->userId);
        DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['is_logged_in' => '1']);
    }

    public function sois2Function()
    {
        $this->sois2 = 'sois2.puptaguigcs.net'; 
        return $this->sois2;
    }
    public function gpoaFunction()
    {
        $this->gpoa = 'sois-gpoa.puptaguigcs.net'; 
        return $this->gpoa;
    }
    public function membershipFunction()
    {
        $this->membership = 'sois-membership.puptaguigcs.net'; 
        return $this->membership;
    }
    public function soisarFunction()
    {
        $this->soisar = 'sois-ar.puptaguigcs.net'; 
        return $this->soisar;
    }

    public function render()
    {
        return view('livewire.sois-gates',[
            'sois2' => $this->sois2Function(),
            'gpoa' => $this->gpoaFunction(),
            'member' => $this->membershipFunction(),
            'soisar' => $this->soisarFunction(),
        ]);
    }
}
