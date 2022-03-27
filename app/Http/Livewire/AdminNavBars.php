<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Objects;
use App\Http\Controllers\PermissionCheckerController;

use Auth;
use Illuminate\Support\Facades\DB;

class AdminNavBars extends Component
{
    public $role;
    public $userId;
    public $userData;
    public $userRole;
    public $userPermission;
    private $permssionChecker;

    private $roleData;
    private $role_user_data;
    private $object;
    private $user_data;

    public function mount()
    {
       // $this->user_data = User::find(Auth::id()); 
       //  $this->userRole = $this->user_data->roles->first();
       //  dd($this->userRole);
    }

    public function getUserPermission()
    {
        $this->user_data = User::find(Auth::id()); 
        $this->userPermission = $this->user_data->permissions()->get();
        return $this->userPermission; 
    }

    public function getUserData()
    {
        // $userData = User::findOrFail(Auth::id());
        // dd($userData->permissions);
        // foreach ($userData->roles as $role) {
        //     echo $role->pivot->role;
        // }
        // echo "<br><br>";
        // dd(DB::table('permission_user')->where('user_id','=',Auth::id())->get());
        // $this->permssionChecker = new PermissionCheckerController();
        // $this->permssionChecker->test('helllo');
        // dd(DB::table());
        // $this->object = new Objects();
        // $this->userRole = $this->object->roles();
        $this->role_user_data = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd($this->role_user_data->role_id);
        $this->roleData = DB::table('roles')->where('role_id','=',$this->role_user_data->role_id)->first();
        // dd($this->roleData->role);
        return $this->roleData->role; 
    }
    public function logoutControll()
    {
        $this->userId = Auth::id();
        // dd(DB::table('sois_gates')->where('user_id','=',$this->userId)->get());
        DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['is_logged_in' => '0']);
        // dd("Hello");
    }
    public function render()
    {
        return view('livewire.admin-nav-bars',[
            'getUserRole' => $this->getUserData(),
            'getUserPerms' => $this->getUserPermission(),
        ]);
    }
}
