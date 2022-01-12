<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\NavigationMenu;
use App\Models\NavigationMenuType;
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
    public $modelSyncNavigationTypesVisible = false;
    public $InformationBox = false;

    public $modelConfirmDeleteVisible;

    /* Variables */
    public $modelId;
    public $label;
    public $slug;
    public $navLabel;
    public $sequence = 1;
    public $type;
    public $pageData;
    public $inputLabelError = 0;
    public $inputTypeError = 0;
    public $navType = [];
    public $is_topnav;
    public $is_footer;
    public $seletedNavigationMenu;
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

    // public function create()
    // {
    //     // dd($this->label);
    //     $this->pageData = Page::find($this->label);
    //     $this->navLabel = $this->pageData->title;
    //     $this->slug = $this->pageData->slug;
    //     // $this->validate();
    //     NavigationMenu::create($this->modelData());
    //     $this->modalFormVisible = false;
    //     $this->reset();
    //     $this->resetValidation();


    // }
    public function create()
    {
        // dd($this->label);
        // $this->pageData = Page::find($this->label);
        // $this->navLabel = $this->pageData->title;
        // dd($this->type);
        if($this->navLabel || $this->type != null){
            // if($this->type != null){
            //     dd("Hello");
            // }else{
            //     $this->inputTypeError = 1;
            // }
            // $this->slug = $this->pageData->slug;
            // $this->validate();
            // NavigationMenu::create($this->modelData());
            // $this->modalFormVisible = false;
            // $this->reset();
            // $this->resetValidation();

            $this->pageData = Page::find($this->label);
            $this->navLabel = $this->pageData->title;
            $this->slug = $this->pageData->slug;
            // $this->validate();
            NavigationMenu::create($this->modelData());
            $this->modalFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            $this->inputLabelError = 1;
        }
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
        $this->is_topnav = $data->is_topnav;
        $this->is_footer = $data->is_footer;
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
        $this->pageData = Page::find($this->label);
        $this->navLabel = $this->pageData->title;
        $this->slug = $this->pageData->slug;
        $this->validate();
        NavigationMenu::find($this->modelId)->update($this->modelData());
        $this->updatemodalFormVisible = false;
        $this->reset();
        $this->resetValidation();

        // $this->validate();
        // NavigationMenu::find($this->modelId)->update($this->modelData());
        // $this->modalFormVisible = false;
    }

    /*=====  End of Create Navigation MenuSection comment block  ======*/
    /*=====  End of Update Navigation  ======*/


    /*=========================================
    =            Delete Navigation            =
    =========================================*/

    public function deleteShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modelConfirmDeleteVisible = true;
        $this->loadModel();
    }

    public function delete()
    {
        NavigationMenu::destroy($this->modelId);
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /*=====  End of Delete Navigation  ======*/

    /*===================================================================
    =            Sync Naviigation Type Section comment block            =
    ===================================================================*/
    public function syncNavigationType($id)
    {
        $this->modelId = $id;
        $this->modelSyncNavigationTypesVisible = true;

    }
    public function syncNavtypes()
    {
        NavigationMenu::find($this->modelId)->update(['is_topnav'=>$this->is_topnav,'is_footer'=>$this->is_footer,]);
        $this->modelSyncNavigationTypesVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    
    /*=====  End of Sync Naviigation Type Section comment block  ======*/
    

    public function infoShowModel()
    {
        $this->InformationBox = true;
    }

    
    /**
     *
     * Get NAvigationtypes
     *
     */
    public function getNavigationTypeFromDatabase()
    {
        return NavigationMenuType::where('status','=','1')->get();
    }

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
            'getNavigationType' => $this->getNavigationTypeFromDatabase(),
        ]);
    }
}