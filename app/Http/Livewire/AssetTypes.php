<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AssetType;

use Livewire\WithPagination;
use App\Http\Livewire\Objects;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Auth;

class AssetTypes extends Component
{
    /* Traits */
    use WithPagination;

    /* Modals */
    public $modalCreateUpdateAssetTypesFormVisible = false;
    public $modalDeleteAssetTypesFormVisible = false;
    
    /* Variables */
    public $asset_type_id;
    public $type;
    public $asset_type_description;
    public $status;

    public $assetTypeData;
    public $InformationBox;

    private $RoleUserDataOnNull;
    private $RoleDataOnNull;
    
    /*===============================================================
    =            Create Asset Type Section comment block            =
    ===============================================================*/
    public function createAssetTypeShowModel()
    {
        // dd("Hello");
        $this->resetValidation();
        $this->reset();
        $this->modalCreateUpdateAssetTypesFormVisible = true;
    }
    public function createAssetTypeProcess()
    {
        $this->status = 1;
        AssetType::create($this->createUpdateModal());
        $this->modalCreateUpdateAssetTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Create Asset Type Section comment block  ======*/

    /*===============================================================
    =            Update Asset Type Section comment block            =
    ===============================================================*/
    public function updateAssetTypeShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->asset_type_id = $id;
        $this->modalCreateUpdateAssetTypesFormVisible = true;
        $this->loadAssetTypeModel();
    }
    public function loadAssetTypeModel()
    {
        $this->assetTypeData = AssetType::find($this->asset_type_id);
        $this->type = $this->assetTypeData->type;
        $this->asset_type_description = $this->assetTypeData->asset_type_description;
    }
    public function updateAssetTypeProcess()
    {
        $this->status = 1;
        AssetType::find($this->asset_type_id)->update($this->createUpdateModal());
        $this->modalCreateUpdateAssetTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }    
    /*=====  End of Update Asset Type Section comment block  ======*/
    
    /*===============================================================
    =            Delete Asset Type Section comment block            =
    ===============================================================*/
    public function deleteAssetTypeShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->asset_type_id = $id;
        $this->modalDeleteAssetTypesFormVisible = true;
    }
    public function deleteAssetTypeProcess()
    {
        $this->status = false;
        AssetType::find($this->asset_type_id)->update(['status'=>$this->status]);
        $this->modalDeleteAssetTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of Delete Asset Type Section comment block  ======*/

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
     * Create and update form function
     *
     */
    public function createUpdateModal()
    {
        return [
            'type' => $this->type,
            'asset_type_description' => $this->asset_type_description,
            'status' => $this->status,
        ];
    }
    /**
     *
     * Form Rules
     *
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'asset_type_description' => 'required',
            'status' => 'required',
        ];
    }
    /**
     *
     * Display Data
     *
     */
    public function read()
    {
        return AssetType::paginate(5);
        // return AssetType::where('status','=','1')->paginate(5);
    }

    public function render()
    {
        return view('livewire.asset-types',[
            'getAssetTypes' => $this->read(),
            'getUserRole' => $this->getAuthUserRole(),
        ]);
    }
}
