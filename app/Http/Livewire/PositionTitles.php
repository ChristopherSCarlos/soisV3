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
    public $selectedOrganization;

    public $user;
    public $va;
    private $role;
    private $userRoles;
    private $userRole;
    private $userRolesString;


    public $userId;
    public $authUserId;
    public $authUserData;
    public $authUserRole;
    public $authUserRoleType;
    public $authUser;
    public $OrgDataFromUser;
    public $orgUserId;
    public $userOrganization;
    // public $selectedOrganization;
    public $orgCount;
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

        $this->userId = Auth::id();
        $this->user = User::find($this->userId);
        $this->role = $this->user->roles->first();
        // dd($this->va->organization_id);
        // $this->organization_id = $this->va->organization_id;
        if($this->role->role = 'Super Admin'){
            PositionTitle::create($this->modelCreateOrgPositionTitle());
            // dd($this->selectedOrganization);

        }elseif($this->role->role = 'Home Page Admin'){
            $this->va = $this->user->organizations->first();
            PositionTitle::create($this->modelCreatePositionTitle());
            // dd($this->va);
        }
        // dd("HEllo");
        $this->CreatemodalFormVisible = false;
        $this->reset(); 
        $this->resetValidation(); 
    }

    public function modelCreatePositionTitle()
    {
        return[
            'position_title' => $this->position_title,
            'organization_id' => $this->organization_id,
        ];
    }
    public function modelCreateOrgPositionTitle()
    {
        return[
            'position_title' => $this->position_title,
            'organization_id' => $this->selectedOrganization,
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
        $data = PositionTitle::find($this->position_title_id);
        $this->organization_id = $data->organization_id;
        $this->position_title = $data->position_title;
    }

    public function update()
    {
        // dd($this);
        $this->validate([
            'position_title' => 'required',
            'selectedOrganization' => 'required',
        ]);
        PositionTitle::find($this->position_title_id)->update($this->modelData());
        $this->UpdatemodalFormVisible = false;
    }

    public function modelData()
    {
        return [
            'position_title' => $this->position_title,
            'organization_id' => $this->selectedOrganization,
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
        PositionTitle::find($this->position_title_id)->delete();
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    /*=====  End of Delete Org Position  ======*/
    
    /*===================================
    =            Call Tables            =
    ===================================*/
    
    public function getPositionTitleData()
    {
        // dd(DB::table('position_titles')->paginate(10));
        return DB::table('position_titles')->paginate(10);
    }

    public function specificOrganization()
    {
        $this->authUser = Auth::id();
        $this->user = User::find($this->authUser);
        $this->OrgDataFromUser = $this->user->organizations->first();
        // dd($this->OrgDataFromUser->id);
        if($this->OrgDataFromUser){
            $this->orgUserId = $this->OrgDataFromUser->organization_id;
            $this->userOrganization = $this->OrgDataFromUser->organization_name;
            // dd($this->orgUserId);
            $this->orgCount = true;
            // dd($this->orgCount);
            // dd(DB::table('organizations')->where('organization_id', '=', $this->orgUserId)->get());
            return DB::table('position_titles')
           ->where('organization_id', '=', $this->orgUserId)
           ->get();



        }else{
            $this->orgCount = false;
            return DB::table('position_titles')
           ->get();            
            // dd("2");
        }
    }
    
    /*=====  End of Call Tables  ======*/

    /*=============================================
    =            Get User Organization            =
    =============================================*/
    public function userOrg()
    {
        $this->userId = Auth::id();
        $this->user = User::find($this->userId);
        $this->va = $this->user->organizations->first();
        $this->organization_id = $this->va->organizations_id;
        return $this->organization_id;
    }
    
    public function getUserOrganization()
    {
        $this->userId = Auth::id();
        $this->user = User::find($this->userId);
        $this->va = $this->user->organizations->first();
        $this->organization_id = $this->va->organizations_id;
        // dd("Hello");
        // dd(DB::table('position_titles')->where('organization_id','=',$this->userOrg())->paginate(10));
        return DB::table('position_titles')->where('organization_id','=',$this->organization_id)->paginate(10);
    }

    
    /*=====  End of Get User Organization  ======*/
    

    /*=====================================
    =            Get User Role            =
    =====================================*/
    
    public function getAuthUserRole()
    {
        $this->authUserId = Auth::id();
        $this->authUserData = User::find($this->authUserId);        
        $this->authUserRole = $this->authUserData->roles->first();
        $this->authUserRoleType = $this->authUserRole->role;         
        // dd($this->authUserRoleType);
        // dd($this->authUserRoleType);
        return $this->authUserRoleType;
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
            'getUserOrgData' => $this->specificOrganization(),
            'getUserRole' => $this->getAuthUserRole(),
        ]);
    }
}
