<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\NavigationMenu;
use App\Models\NavigationMenuType;
use App\Models\Page;
use Livewire\withPagination;
use Illuminate\Support\Facades\DB;


class NavigationTypes extends Component
{
    /* Traits */
    use withPagination;
    /* Modals */
    public $modalCreateNavigationTypeFormVisible = false;
    public $modalDeleteNavigationTypeFormVisible = false;
    public $InformationBox = false;
    /* Variables */
    public $navigation_menu_type;
    public $navigation_menu_description;
    public $status;
    public $navTypeID;
    public $data;


    /*====================================================
    =            Craete Section comment block            =
    ====================================================*/
    public function createShowModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreateNavigationTypeFormVisible = true;
    }
    public function create()
    {
        $this->status = '1';
        NavigationMenuType::create($this->modelData());
        $this->modalCreateNavigationTypeFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Craete Section comment block  ======*/

    /*====================================================
    =            Update Section comment block            =
    ====================================================*/
    public function updateNavTypeShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreateNavigationTypeFormVisible = true;
        $this->navTypeID = $id;
        $this->loadModel();
    }
    public function update()
    {
        $this->status = 1;
        NavigationMenuType::find($this->navTypeID)->update($this->modelData());
        $this->modalCreateNavigationTypeFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of Update Section comment block  ======*/
    

    /*====================================================
    =            Delete Section comment block            =
    ====================================================*/
    public function deleteNavTypeShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalDeleteNavigationTypeFormVisible = true;
        $this->navTypeID = $id;
    }
    public function delete()
    {
        NavigationMenuType::find($this->navTypeID)->update(['status'=>'0']);
        $this->modalDeleteNavigationTypeFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of Delete Section comment block  ======*/
    

    public function loadModel()
    {
        $this->data = NavigationMenuType::find($this->navTypeID);
        $this->navigation_menu_type = $this->data->navigation_menu_type;
        $this->navigation_menu_description = $this->data->navigation_menu_description;
    }

    public function modelData()
    {
        return [
            'navigation_menu_type' => $this->navigation_menu_type,
            'navigation_menu_description' => $this->navigation_menu_description,
            'status' => $this->status,
        ];
    }


    public function infoShowModel()
    {
        $this->InformationBox = true;
    }

    public function rules()
    {
        return [
            'navigation_menu_type' => 'required',
            'navigation_menu_description' => 'required',
            'status' => 'required',
        ];
    }
    public function display()
    {
        return NavigationMenuType::where('status','=','1')->get();
    }
    public function render()
    {
        return view('livewire.navigation-types',[
            'getDsiplayNavigationMenuItem' => $this->display(),
        ]);
    }
}
