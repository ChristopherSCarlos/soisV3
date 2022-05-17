<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\SoisSubGate;
use App\Http\Livewire\Objects;
use App\Http\Controllers\PermissionCheckerController;

use Auth;
use Illuminate\Support\Facades\DB;

class SoisSubLinks extends Component
{

    public $modelConfirmUserDeleteVisible = false;

    public $sois_sub_id;

    public function deleteModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->sois_sub_id = $id;
        $this->modelConfirmUserDeleteVisible = true;
        // dd(DB::table('sois_sub_gates')->where('status','=',1)->get());
    }


    public function delete()
    {
        SoisSubGate::where('sois_sub_gate_id','=',$this->sois_sub_id)->update(['status' => 0]);
        $this->modelConfirmUserDeleteVisible = false;
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.sois-sub-links',[
            'soisLinks' => DB::table('sois_sub_gates')->where('status','=',1)->get(),
        ]);
    }
}
