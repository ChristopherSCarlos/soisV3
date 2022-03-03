<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\InterfaceType;
use Livewire\withPagination;
use App\Http\Livewire\Objects;

class InterfaceTypes extends Component
{
    /* Traits */
    use WithPagination;
    /* Modals */
    public $modalCreateInterfaceTypesFormVisible = false;
    public $modalDeleteInterfaceTypesFormVisible = false;
    public $InformationBox = false;
    /* Models */
    public $interface_type;
    public $description;
    public $status;
    public $interface_type_id;
    public $interfaceTypeData;
    
    /*===================================================================
    =            Create Interface Type Section comment block            =
    ===================================================================*/
    public function createInterfaceTypeShowModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreateInterfaceTypesFormVisible = true;
    }
    public function createInterfaceTypeProcess()
    {
        $this->status = 1;
        InterfaceType::create($this->createUpdateModal());
        $this->modalCreateInterfaceTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Create Interface Type Section comment block  ======*/
    
    /*====================================================================
    =            Updatte Interface Type Section comment block            =
    ====================================================================*/
    public function updateInterfaceTypesShowModal($id)
    {
        $this->interface_type_id = $id;
        $this->modalCreateInterfaceTypesFormVisible = true;
        // dd($this->interface_type_id);
        $this->interfaceTypeLoadModel();
    }
    public function interfaceTypeLoadModel()
    {
        $this->interfaceTypeData = InterfaceType::find($this->interface_type_id);
        $this->interface_type = $this->interfaceTypeData->interface_type;
        $this->description = $this->interfaceTypeData->description;
    }
    public function updateInterfaceType()
    {
        $this->status = 1;
        InterfaceType::find($this->interface_type_id)->update($this->createUpdateModal());
        $this->modalCreateInterfaceTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of Updatte Interface Type Section comment block  ======*/
    
    /*===================================================================
    =            Delete Interface Type Section comment block            =
    ===================================================================*/
    public function deleteInterfaceTypesShowModal($id)
    {
        $this->interface_type_id = $id;
        $this->modalDeleteInterfaceTypesFormVisible = true;
        // dd($this->interface_type_id);
        $this->interfaceTypeLoadModel();
    }
    public function deleteInterfaceTypeProcess()
    {
        InterfaceType::find($this->interface_type_id)->update(['status' => '0']);
        $this->modalDeleteInterfaceTypesFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    
    /*=====  End of Delete Interface Type Section comment block  ======*/


    public function infoShowModel()
    {
        $this->InformationBox = true;
    }

    /**
     *
     * Create and update Modal
     *
     */
    
    public function createUpdateModal()
    {
        return [
            'interface_type' => $this->interface_type,
            'description' => $this->description,
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
            'interface_type' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];
    }
    public function read()
    {
        return InterfaceType::where('status','=','1')->paginate(5);
    }
    public function render()
    {
        return view('livewire.interface-types',[
            'getInterfaceType' => $this->read(),
        ]);
    }
}
