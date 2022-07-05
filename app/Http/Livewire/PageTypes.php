<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\PageType;
use Livewire\WithPagination;
use App\Http\Livewire\Objects;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Auth;

class PageTypes extends Component
{
    /* Traits */
    use WithPagination;

    /* Modals */
    public $modalCreateUpdatePageTypesFormVisible = false;
    public $modalDeletePageTypesFormVisible = false;
    public $InformationBox = false;

    
    /* Variables */
    public $page_type;
    public $page_description;
    public $status;

    public $pageTypeID;
    public $pageTypeData;

    private $RoleUserDataOnNull;
    private $RoleDataOnNull;

    /*=============================================================
    =            Create Page TypeSection comment block            =
    =============================================================*/
    public function createPageTypeShowModel()
    {
        // dd("Hello");
        $this->resetValidation();
        $this->reset();
        $this->modalCreateUpdatePageTypesFormVisible = true;
    }
    public function createUpdateInterfaceTypeProcess()
    {
        $this->status = 1;
        PageType::create($this->createUpdateModal());
        $this->modalCreateUpdatePageTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Create Page TypeSection comment block  ======*/
    
    /*==============================================================
    =            Update Page Type Section comment block            =
    ==============================================================*/
    public function updatePageTypeShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->pageTypeID = $id;
        $this->modalCreateUpdatePageTypesFormVisible = true;
        // dd($this->pageTypeID);
        $this->pageTypeLoadModel();
    }
    public function pageTypeLoadModel()
    {
        $this->pageTypeData = PageType::find($this->pageTypeID);
        $this->page_type = $this->pageTypeData->page_type;
        $this->page_description = $this->pageTypeData->page_description;
    }
    public function updatePageTypeProcess()
    {
        $this->status = 1;
        PageType::find($this->pageTypeID)->update($this->createUpdateModal());
        $this->modalCreateUpdatePageTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Update Page Type Section comment block  ======*/
    
    /*==============================================================
    =            Delete PAge Type Section comment block            =
    ==============================================================*/
    public function deletePageTypeShowModal($id)
    {
        $this->pageTypeID = $id;
        $this->modalDeletePageTypesFormVisible = true;
        // dd($this->pageTypeID);
    }
    public function deleteInterfaceTypeProcess()
    {
        PageType::find($this->pageTypeID)->update(['status'=>'0']);
        $this->modalCreateUpdatePageTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    
    /*=====  End of Delete PAge Type Section comment block  ======*/

    public function getAuthUserRole()
    {
        $this->authUserId = Auth::id();
        $this->authUserData = User::find($this->authUserId);        
        if($this->authUserData->roles->first() != null){
            $this->authUserRole = $this->authUserData->roles->first();
            print_r($this->authUserRole->role);           
            $this->authUserRoleType = $this->authUserRole->role;         
            echo "Not Null";
        }else{
            $this->RoleUserDataOnNull = DB::table('role_user')->where('user_id','=',Auth::id())->first();
            // dd($this->RoleUserDataOnNull->role_id);
            $this->RoleDataOnNull = DB::table('roles')->where('role_id','=',$this->RoleUserDataOnNull->role_id)->first();        
            // dd($this->RoleDataOnNull->role);        
            echo "Null";
            $this->authUserRoleType = $this->RoleDataOnNull->role;         
        }
        // dd($this->authUserRoleType);
        // dd($this->authUserId);
        return $this->authUserRoleType;
    }
    
    public function infoShowModel()
    {
        $this->InformationBox = true;
    }

    /**
     *
     * Form Rules
     *
     */
    public function rules()
    {
        return [
            'page_type' => 'required',
            'page_description' => 'required',
            'status' => 'required',
        ];
    }

    /**
     *
     * Create Update Modal
     *
     */
    public function createUpdateModal()
    {
        return [
            'page_type' => $this->page_type,
            'page_description' => $this->page_description,
            'status' => $this->status,
        ];
    }


    public function read()
    {
        return PageType::where('status','=','1')->paginate(5);
    }

    public function render()
    {
        return view('livewire.page-types',[
            'getPageTypeData' => $this->read(),
            'getUserRole' => $this->getAuthUserRole(),
        ]);
    }
}
