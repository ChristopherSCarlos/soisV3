<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Article;
use App\Models\User;
use App\Http\Livewire\Objects;


use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Auth;

class Sliders extends Component
{
    /* Traits */
    use withPagination;
    
    private $object;
    public $userRole;
    public $userRoleString;

    /* Modals */
    public $modalAddNewsFormVisible = false;
    public $modalRemoveNewsFormVisible = false;
    
    public $modalOrganizationAddNewsFormVisible = false;
    public $modalRemoveOrgNewsFormVisible = false;
    /* Variables */
    public $articleData;
    public $articleID;
    public $userId;
    public $user;
    public $va;
    public $organization_id;
    public $articleOrgData;

    
    public function mount()
    {
        $this->object = new Objects();
        $this->userRole = $this->object->roles();
        $this->userRoleString = $this->userRole->role;
        // dd($this->userRoleString);
    }


    public function createSlider()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalAddNewsFormVisible = true;
    }

    public function add()
    {
        Article::find($this->articleData)->update(['is_carousel_homepage'=>'1']);
        $this->modalAddNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }


    public function deleteNewsShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->articleID = $id;
        $this->modalRemoveNewsFormVisible = true;
    }
    public function remove()
    {
        Article::find($this->articleID)->update(['is_carousel_homepage'=>'0']);
        $this->modalRemoveNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }

    /*================================================================
    =            Organization Admin Section comment block            =
    ================================================================*/
    public function createOrgSlider()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalOrganizationAddNewsFormVisible = true;
    }
    public function addOrg()
    {
        Article::find($this->articleOrgData)->update(['is_carousel_org_page'=>'1']);
        $this->modalOrganizationAddNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    public function deleteOrgNewsShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->articleID = $id;
        $this->modalRemoveOrgNewsFormVisible = true;
    }

    public function removeOrg()
    {
        Article::find($this->articleID)->update(['is_carousel_org_page'=>'0']);
        $this->modalRemoveOrgNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }

    /*=====  End of Organization Admin Section comment block  ======*/
    
    public function getOrganizationArticlesSliderFromDatabase()
    {
        return DB::table('articles')->where('is_carousel_org_page','=','1')->where('organization_id','=',$this->userOrg())->paginate(10);
    }

    public function getOrganizationArticlesFromDatabase()
    {
        // return Article::where('status','=','1')->where('organization_id','=',$this->organization_id)->get();
        // dd();
        return DB::table('articles')->where('status','=','1')->where('organization_id','=',$this->userOrg())->get();
        // dd(Article::where('status','=','1')->where('organization_id','=',$this->organization_id)->get());
    }

    public function getArticlesFromDatabase()
    {
        // dd(DB::table('articles')->where('status','=','1')->get());
        // dd(Article::where('status','=','1')->get()   );
        return Article::where('status','=','1')->get();
    }

    public function read()
    {

        // dd(DB::table('articles')->where('is_carousel_homepage','=','1')->get());
        // dd(DB::table('articles')->where('is_carousel_homepage','=','1')->paginate(10));
        return DB::table('articles')->where('is_carousel_homepage','=','1')->paginate(10);
    }

    public function userOrg()
    {
        $this->userId = Auth::id();
        $this->user = User::find($this->userId);
        $this->va = $this->user->organizations->first();
        $this->organization_id = $this->va->organization_id;
        return $this->organization_id;
    }

    public function getRole()
    {
        // dd($this->userRole->role);
    }

    public function render()
    {
        return view('livewire.sliders',[
            'getCarouselHomepage' => $this->read(),
            'getCarouselOrganization' => $this->getOrganizationArticlesFromDatabase(),
            'getDisplayArticleOnSelectModal' => $this->getArticlesFromDatabase(),
            'getDisplayOrganizationArticleOnSelectModal' => $this->getOrganizationArticlesSliderFromDatabase(),
        ]);
    }
}
