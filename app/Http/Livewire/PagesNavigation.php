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
    public function createShowModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }


    public function create()
    {
        // dd($this->label);
        $this->pageData = Page::find($this->label);
        $this->navLabel = $this->pageData->title;
        // dd($this->navLabel);
        $this->slug = $this->pageData->slug;
        $this->validate();
        NavigationMenu::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }

    public function modelData()
    {
        return [
            'label' => $this->navLabel,
            'slug' => $this->slug,
            'sequence' => $this->sequence,
            'type' => $this->type,
        ];
    }
    
    
    /*=====  End of Create Navigation MenuSection comment block  ======*/
    



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
