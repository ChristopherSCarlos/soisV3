<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Objects;

use App\Models\DefaultInterface;
use App\Models\InterfaceType;
use App\Models\SystemAsset;


use Livewire\Component;
use Livewire\WithFileUploads;

class DefaultInterfaces extends Component
{
    /* Traits */
    use WithFileUploads;
    
    /* Modals */
    public $createDefaultInterfaceShowModalFormVisible = false;
    public $deleteDefaultInterfaceShowModalFormVisible = false;
    public $defaultInterfaceInformationBox = false;

    /* Variables */
    public $interfaceID;    
    public $interface_name;    
    public $interface_description;
    public $interface_primary_color;
    public $interface_secondary_color;
    public $interface_tertiary_color;
    public $interface_primary_text_color;
    public $interface_secondary_text_color;
    public $interface_type_id;
    public $status;
    public $data;

    /*======================================================================
    =            Create Default Interface Section comment block            =
    ======================================================================*/
    public function createDefaultInterfaceShowModel()
    {
        $this->reset();
        $this->resetValidation();
        $this->createDefaultInterfaceShowModalFormVisible = true;
    }
    public function modelCreateDefaultInterface()
    {
        return [
            'interface_name' => $this->interface_name,
            'interface_description' => $this->interface_description,
            'interface_primary_color' => $this->interface_primary_color,
            'interface_secondary_color' => $this->interface_secondary_color,
            'interface_tertiary_color' => $this->interface_tertiary_color,
            'interface_primary_text_color' => $this->interface_primary_text_color,
            'interface_secondary_text_color' => $this->interface_secondary_text_color,
            'interface_type_id' => $this->interface_type_id,
            'status' => $this->status,
        ];
    }
    public function createInterface()
    {
        // $this->resetValidation();
        // $this->validate(); 
        $this->status = '1';
        DefaultInterface::create($this->modelCreateDefaultInterface());
        $this->createDefaultInterfaceShowModalFormVisible = false;
        $this->reset(); 
        $this->resetValidation();
    }
    
    
    /*=====  End of Create Default Interface Section comment block  ======*/
    
    /*======================================================================
    =            Update Default Interface Section comment block            =
    ======================================================================*/
    public function updateDefaultInterfaceShowModel($id)
    {
        $this->interfaceID = $id;
        $this->loadUpdateModel(); 
        $this->createDefaultInterfaceShowModalFormVisible = true;
    }
    public function loadUpdateModel()
    {
        $this->data = DefaultInterface::find($this->interfaceID);
        $this->interface_name = $this->data->interface_name;
        $this->interface_description = $this->data->interface_description;
        $this->interface_primary_color = $this->data->interface_primary_color;
        $this->interface_secondary_color = $this->data->interface_secondary_color;
        $this->interface_tertiary_color = $this->data->interface_tertiary_color;
        $this->interface_primary_text_color = $this->data->interface_primary_text_color;
        $this->interface_secondary_text_color = $this->data->interface_secondary_text_color;
        $this->interface_type_id = $this->data->interface_type_id;
        $this->status = $this->data->status;
    }   
    public function updateInterface()
    {
        $this->validate();
        DefaultInterface::find($this->interfaceID)->update($this->modelCreateDefaultInterface());
        $this->createDefaultInterfaceShowModalFormVisible = false;
        $this->resetValidation();
        $this->reset();
    }   
    /*=====  End of Update Default Interface Section comment block  ======*/
    
    /*======================================================================
    =            Delete Default Interface Section comment block            =
    ======================================================================*/
    public function deleteDefaultInterfaceShowModel($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->interfaceID = $id;
        $this->deleteDefaultInterfaceShowModalFormVisible = true;
    }
    public function deleteInterface()
    {
        DefaultInterface::find($this->interfaceID)->update(['status'=>'0']);
        $this->createDefaultInterfaceShowModalFormVisible = false;
        $this->resetValidation();
        $this->reset();
    }    
    
    /*=====  End of Delete Default Interface Section comment block  ======*/
    
    public function infoShowModel()
    {
        $this->defaultInterfaceInformationBox = true;
    }

    public function rules()
    {
        return [
            'interface_name' => 'required',
            'interface_description' => 'required',
            'interface_primary_color' => 'required',
            'interface_secondary_color' => 'required',
            'interface_tertiary_color' => 'required',
            'interface_primary_text_color' => 'required',
            'interface_secondary_text_color' => 'required',
            'interface_type_id' => 'required',
            'status' => 'required',
        ];
    }

    public function displayDefaultInterfaceData()
    {
        return DefaultInterface::where('status','=','1')->get();
    }

    public function displayInterfaceTypeData()
    {
        return InterfaceType::get();
    }

    public function render()
    {
        return view('livewire.default-interfaces',[
            'displayInterface' => $this->displayDefaultInterfaceData(),
            'displayInterfaceType' => $this->displayInterfaceTypeData(),

        ]);
    }
}
