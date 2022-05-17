<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Objects;
use App\Http\Controllers\PermissionCheckerController;

use Auth;
use Illuminate\Support\Facades\DB;

class ARLinks extends Component
{
    public $sub_link_id;
    public $role_id;
    private $role_data_pivot;
    private $role_data;

    public function soisAccomplishmentReport()
    {
        // dd(DB::table('sois_sub_gates')->where('sub_'))
        // DB::table('sois_sub_gates')->where('sub_under_for','=',1)->
        $this->role_data_pivot = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd($this->role_data_pivot->role_id);
        $this->role_data = DB::table('roles')->where('role_id','=',$this->role_data_pivot->role_id)->first();
        // return $this->role_data->role;
        // dd(DB::table('roles')->where('role_id','=',$this->role_data_pivot->role_id)->first());
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->get());
        // dd(DB::table('sois_sub_gates')->where('sub_under_for','=',1)->where('')->get());
        return DB::table('sois_sub_gates')->where('sub_under_for','=',1)->where('role_id','=',$this->role_data->role_id)->get();

            // 'AR_sub_links' => DB::table('sois_sub_gates')->where('sub_under_for','=',1)->where()->get(),
    }

    public function render()
    {
        return view('livewire.a-r-links',[
            'AR_sub_links' => $this->soisAccomplishmentReport(),
        ]);
    }
}
