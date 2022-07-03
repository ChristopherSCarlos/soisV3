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

    private $userRole;
    private $userroles;
    private $Returnuserroles;

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

    public function getRole()
    {
        $this->userRole = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->first());
        $this->userroles = DB::table('roles')->where('role_id','=',$this->userRole->role_id)->first();
        // dd(DB::table('roles')->where('role_id','=',$this->userRole->role_id)->first());
        $this->Returnuserroles = $this->userroles->role;
        // dd($this->userroles->role);
        // return $this->userroles;
        return $this->Returnuserroles;
    }
    public function render()
    {
        return view('livewire.sois-sub-links',[
            'soisLinks' => DB::table('sois_sub_gates')->where('status','=',1)->get(),
            'UserRole' => $this->getRole(),
        ]);
    }
}
