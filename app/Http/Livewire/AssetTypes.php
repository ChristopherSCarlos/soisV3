<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AssetType;

use Livewire\withPagination;
use App\Http\Livewire\Objects;

class AssetTypes extends Component
{
    /* Traits */
    use WithPagination;

    /* Modals */
    public $modalCreateUpdateAssetTypesFormVisible = false;
    public $modalDeleteAssetTypesFormVisible = false;
    
    /* Variables */
    public $asset_types_id;
    public $asset_type_name;
    public $asset_type_description;
    public $status;

    public $assetTypeData;
    public $InformationBox;
    
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
        $this->asset_types_id = $id;
        $this->modalCreateUpdateAssetTypesFormVisible = true;
        $this->loadAssetTypeModel();
    }
    public function loadAssetTypeModel()
    {
        $this->assetTypeData = AssetType::find($this->asset_types_id);
        $this->asset_type_name = $this->assetTypeData->asset_type_name;
        $this->asset_type_description = $this->assetTypeData->asset_type_description;
    }
    public function updateAssetTypeProcess()
    {
        $this->status = 1;
        AssetType::find($this->asset_types_id)->update($this->createUpdateModal());
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
        $this->asset_types_id = $id;
        $this->modalDeleteAssetTypesFormVisible = true;
    }
    public function deleteAssetTypeProcess()
    {
        $this->status = false;
        AssetType::find($this->asset_types_id)->update(['status'=>$this->status]);
        $this->modalDeleteAssetTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of Delete Asset Type Section comment block  ======*/
    
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
            'asset_type_name' => $this->asset_type_name,
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
            'asset_type_name' => 'required',
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
        return AssetType::where('status','=','1')->paginate(5);
    }

    public function render()
    {
        return view('livewire.asset-types',[
            'getAssetTypes' => $this->read(),
        ]);
    }
}
