<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Permission;
use App\Models\Role;

use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;

class Permissions extends Component
{
    /* Traits */
    use WithPagination;

    /* Modals */
    public $modalCreatePermissionFormVisible = false;
    public $modalUpdatePermissionFormVisible = false;
    public $modelConfirmPermissionDeleteVisible = false;

    /* Variables */
    public $permission;
    public $i;
    public $create;
    public $permsId;

    public $name;
    // public $guard_name;
    public $description;
    // public $status;
    public $created_at;
    public $updated_at;

    /*================================================================
    =            Create Permissions Section comment block            =
    ================================================================*/
    public function createShowPermissionModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreatePermissionFormVisible = true;
    }

    public function createCrud()
    {
        // dd($create);
        // $this->resetValidation();
        // $this->validate();
        date_default_timezone_set('Asia/Manila');
        // dd(date('Y-m-d H:i:s')); 
        DB::table('permissions')->insert([
            [
                'name' => $this->permission.'-list',
                // 'guard_name' => 'web',
                'description' => 'list permission enables the | '. $this->permission .' | permission to list data',
                // 'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => $this->permission.'-create',
                // 'guard_name' => 'web',
                'description' => 'create permission enables the | '.$this->permission.' | permission to create data',
                // 'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => $this->permission.'-edit',
                // 'guard_name' => 'web',
                'description' => 'edit permission enables the | '.$this->permission.' | permission to edit data',
                // 'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => $this->permission.'-delete',
                // 'guard_name' => 'web',
                'description' => 'delete permission enables the | '.$this->permission.' | permission to delete data',
                // 'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
        $this->modalCreatePermissionFormVisible = false;
        $this->reset(); 
    }
    
    
    /*=====  End of Create Permissions Section comment block  ======*/
    


    public function rules()
    {
        return [
            'name' => 'required',
            // 'guard_name' => 'required',
            'description' => 'required',
            // 'status' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ];
    }

    /**
     *
     * Get Data From Database
     *
     */
    
    public function getPermissionDataFromDatabase()
    {
        return DB::table('permissions')->paginate(5);
        // return DB::table('permissions')->where('status','=','1')->paginate(5);
    }

    public function render()
    {
        return view('livewire.permissions',[
            'displayData' => $this->getPermissionDataFromDatabase(),
        ]);
    }
}
