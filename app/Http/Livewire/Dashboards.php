<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Livewire\Objects;

use App\Models\User;

use Auth;
use Storage;

use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboards extends Component
{
    private $object;

    public $userData;
    public $userName;
    private $userRole;

    public function mount()
    {

        // $this->object = new Objects;
        // $this->object->userData();
        // $this->userData = $this->object->userData()->roles->first();
        // dd($this->object->userData()->roles);
        // dd($this->userData->role_name);
        $this->userRole = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd(DB::table('roles')->where('role_id','=',$this->userRole->role_id)->get());
        // dd($this->userRole->role_id);
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->first());


        // dd("hello");
    }

    public function getAuthUserDataRoleFromDatabase()
    {
        // dd(DB::table('users')->where('user_id','=',Auth::id())->get());
        // $this->userData = Auth::user();
        // dd($this->userData->name);
        // $this->userName = $this->userData->name;
        $this->userRole = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd(DB::table('roles')->where('role_id','=',$this->userRole->role_id)->get());
        return DB::table('roles')->where('role_id','=',$this->userRole->role_id)->get();
    }
    public function render()
    {
        return view('livewire.dashboards',[
            'getAuthUser' => $this->getAuthUserDataRoleFromDatabase(),
            'getUserData' => DB::table('users')->where('user_id','=',Auth::id())->get(),
        ]);
    }
}
