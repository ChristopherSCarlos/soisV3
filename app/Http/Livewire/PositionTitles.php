<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\PositionTitle;

use Livewire\withPagination;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;

use Auth;

class PositionTitles extends Component
{
    use WithPagination;

    public $CreatemodalFormVisible = false;
    public $UpdatemodalFormVisible = false;
    public $modelConfirmDeleteVisible = false;

    public $position_title_id;
    public $position_title;
    public $organization_id;

    public $user;
    public $va;
    private $role;
    private $userRoles;
    private $userRole;
    private $userRolesString;

    public $userId;
    public $userData;
    public $userOrganizationData;

    /*==================================
    =            Mount Auth            =
    ==================================*/
    
    public function mount()
    {
        $this->role  = new Announcements();
        $this->userRole = $this->role->getAuthRoleUser();
    }

    public function org()
    {
        $this->userId = Auth::id();
        $this->userData = User::find($this->userId);
        // dd($this->userData->name);
        // dd($this->userData->organizations);
        // $this->userOrganizationData = $this->userData->organizations->get();
        // dd($this->userOrganizationData->organization_name);
    }
    
    /*=====  End of Mount Auth  ======*/
    
    /*===========================================
    =            Create Org Position            =
    ===========================================*/
    
    public function createPositionTitleModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->CreatemodalFormVisible = true;
    }

    public function create()
    {
        // dd("Hello");
        PositionTitle::create($this->modelCreatePositionTitle());
        // $this->CreatemodalFormVisible = false;
        // $this->reset(); 
        // $this->resetValidation(); 
    }

    public function modelCreatePositionTitle()
    {
        return[
            'position_title' => $this->position_title,
            'organization_id' => $this->organization_id,
        ];
    }
    
    /*=====  End of Create Org Position  ======*/
    

    /*===========================================
    =            Update Org Position            =
    ===========================================*/
    
    public function updatePositionTitleModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->UpdatemodalFormVisible = true;
        $this->position_title_id = $id;
        $this->loadModel();
    }

    public function loadModel()
    {
        $data = positiontitles::find($this->position_title_id);
        $this->organization_id = $data->organization_id;
        $this->position_title = $data->position_title;
    }

    public function update()
    {
        $this->validate([
            'position_title' => 'required',
            'organization_id' => 'required',
        ]);
        positiontitles::find($this->position_title_id)->update($this->modelData());
        $this->UpdatemodalFormVisible = false;
    }

    public function modelData()
    {
        return [
            'position_title' => $this->position_title,
            'organization_id' => $this->organization_id,
        ];
    }
    
    /*=====  End of Update Org Position  ======*/
    
    /*===========================================
    =            Delete Org Position            =
    ===========================================*/
    
    public function deletePositionTitleModal($id)
    {
        $this->position_title_id = $id;
        $this->modelConfirmDeleteVisible = true;
    }

    public function delete()
    {
        Positiontitles::find($this->position_title_id)->delete();
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    /*=====  End of Delete Org Position  ======*/
    
    /*===================================
    =            Call Tables            =
    ===================================*/
    
    public function getPositionTitleData()
    {
        return DB::table('position_titles')
                    ->paginate(10);
    }
    
    /*=====  End of Call Tables  ======*/

    /*=============================================
    =            Get User Organization            =
    =============================================*/
    
    public function getUserOrganization()
    {
        return DB::table('position_titles')->where('organization_id','=',$this->userOrg())->paginate(10);
    }

    public function userOrg()
    {
        $this->userId = Auth::id();
        $this->user = User::find($this->userId);
        $this->va = $this->user->organizations->first();
        $this->organization_id = $this->va->organizations_id;
        return $this->organization_id;
    }
    
    /*=====  End of Get User Organization  ======*/
    

    /*=====================================
    =            Get User Role            =
    =====================================*/
    
    public function getUserRole()
    {
        $this->userId = Auth::id();
        // dd($this->userId);
        // dd($this->articleCreatedDataId);
        $this->userData = User::find($this->userId);
        $this->userRoles = $this->userData->roles->first();
        $this->userRolesString = $this->userRoles->role_name;
        // dd($this->userRolesString);
        // dd(gettype($this->userRolesString));
        return $this->userRolesString;
    }
    
    /*=====  End of Get User Role  ======*/
    
    /*================================================
    =            Get Organization Section            =
    ================================================*/
    
    public function getOrganizationsFromDatabase()
    {
        return DB::table('organizations')->where('status','=','1')->get();
    }
    
    /*=====  End of Get Organization Section  ======*/

    

    public function render()
    {
        return view('livewire.position-titles',[
            'PositionData' => $this->getPositionTitleData(),
            'Organization' => $this->getUserOrganization(),
            'getOrganization' => $this->getOrganizationsFromDatabase(),
            'getAuthUserRole' => $this->getUserRole(),
        ]);
    }
}
