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
    /* Models */
    public $interface_type;
    public $description;
    public $status;
    public $interface_type_id;
    
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
        dd($this->interface_type_id);
    }
    
    
    /*=====  End of Updatte Interface Type Section comment block  ======*/
    


    public function createUpdateModal()
    {
        return [
            'interface_type' => $this->interface_type,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }

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
        return InterfaceType::paginate(5);
    }
    public function render()
    {
        return view('livewire.interface-types',[
            'getInterfaceType' => $this->read(),
        ]);
    }
}
