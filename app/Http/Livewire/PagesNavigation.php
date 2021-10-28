<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NavigationMenu;
use App\Models\Page;

use Livewire\withPagination;
use Illuminate\Support\Facades\DB;

class PagesNavigation extends Component
{
    /* Traits */
    use withPagination;

    /* Modals */
    public $modalFormVisible = false;
    public $updatemodalFormVisible = false;

    public $modelConfirmDeleteVisible;

    /* Variables */
    public $modelId;
    public $label;
    public $slug;
    public $navLabel;
    public $sequence = 1;
    public $type;

    public $pageData;

    /*===================================================================
    =            Create Navigation MenuSection comment block            =
    ===================================================================*/
    
    public function modelData()
    {
        return [
            'label' => $this->navLabel,
            'slug' => $this->slug,
            'sequence' => $this->sequence,
            'type' => $this->type,
        ];
    }
    
    public function createShowModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }


    public function create()
    {
        $this->pageData = Page::find($this->label);
        $this->navLabel = $this->pageData->title;
        $this->slug = $this->pageData->slug;
        NavigationMenu::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }

    
    
    /*=====  End of Create Navigation MenuSection comment block  ======*/
    
    /*=========================================
    =            Update Navigation            =
    =========================================*/

    public function loadModel()
    {
        $data = NavigationMenu::find($this->modelId);
        $this->label = $data->label;
        $this->slug = $data->slug;
        $this->type = $data->type;
        $this->sequence = $data->sequence;
    }
    
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->updatemodalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    public function update()
    {
        // $this->pageData = Page::find($this->label);
        // $this->navLabel = $this->pageData->title;
        // $this->slug = $this->pageData->slug;
        $this->validate();
        NavigationMenu::find($this->modelId)->update($this->modelData());
        $this->updatemodalFormVisible = false;
        $this->reset();
        $this->resetValidation();

        // $this->validate();
        // NavigationMenu::find($this->modelId)->update($this->modelData());
        // $this->modalFormVisible = false;
    }
    
    /*=====  End of Update Navigation  ======*/


    /*=========================================
    =            Delete Navigation            =
    =========================================*/
    
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modelConfirmDeleteVisible = true;
    }

    public function delete()
    {
        NavigationMenu::destroy($this->modelId);
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    /*=====  End of Delete Navigation  ======*/
    


    /**
     *
     * Get System Pages
     *
     */
    public function getSystemPageFromDatabase()
    {
        return DB::table('pages')->where('status','=','1')->get();
    }

    public function rules()
    {
        return [
            'label' => 'required',
            'slug' => 'required',
            'sequence' => 'required',
            'type' => 'required',
        ];
    }
    public function read()
    {
        return NavigationMenu::paginate(5);
        
    }
    public function render()
    {
        return view('livewire.pages-navigation',[
            'data' => $this->read(),
            'getSystemPage' => $this->getSystemPageFromDatabase(),
        ]);
    }
}
