<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Auth;

class DeletedUsers extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalUpdateUser = false;
    public $modelUpdateUserData = false;
    public $modaladdPermissionModel = false;
    public $modelUpdateUserPasswordData = false;
    public $modelConfirmUserDeleteVisible = false;
    public $modalAddRoleFormVisible = false;
    public $modalAddOrganizationFormVisible = false;
    public $modalCreateTeamsFormVisible = false;
    public $modalDeleteTeamsFormVisible = false;
    public $modalUpdateUserPasswordFormVisible = false;


    // variables
    public $name;
    public $email;
    public $password;
    public $student_number;

    public $userId;
    public $displayRoleData;
    // public $rolesList;
    public $role_type;
    public $roleModel=null;
    public $organizationModel=null;

    public $user;

    public $data;
    public $status;

/*====================================
=            Restore User            =
====================================*/

public function restore($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->userId = $id;


        $this->data = User::find($this->userId);
        $this->status = $this->data->status;

        User::where('users_id',$this->userId)->update([
            'status' => '1',
        ]);
    }

/*=====  End of Restore User  ======*/


    /**
     *
     * Rules for Forms
     *
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
            'student_number' => 'required',
        ];
    }


    public function read()
    {
        // return User::paginate(10);
        return DB::table('users')
                ->where('status','=','0')
                ->orderBy('users_id','asc')
                ->paginate(10);
                // ->get();
    }

    public function render()
    {
        return view('livewire.deleted-users',[
            'displayDeletedData' => $this->read(),
        ]);
    }
}
