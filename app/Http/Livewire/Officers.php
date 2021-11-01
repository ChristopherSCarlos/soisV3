<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Livewire\Announcements;

use App\Models\User;
use App\Models\Officer;

use Livewire\withPagination;

use Illuminate\Support\Facades\DB;

use Auth;

class Officers extends Component
{
    use WithPagination;

    public $CreatemodalFormVisible = false;

    private $role;
    private $userRole;

    public $userId;
    public $userData;
    public $userOrganizationData;

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


    public function FunctionName($value='')
    {
        // code...
    }

    /*==============================================
    =            Create Officer Section            =
    ==============================================*/
    
    public function createOfficerModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->CreatemodalFormVisible = true;
    }

    public function create()
    {
        Officer::create($this->modelCreateOfficer());
        $this->CreatemodalFormVisible = false;
        $this->reset(); 
        $this->resetValidation(); 
    }

    public function modelCreateOfficer()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'organization_id' => $this->organization_id,
            'school_year' => $this->school_year,
            'semester' => $this->semester,
            'position' => $this->position,
            'exp_date' => $this->exp_date,
            'position_category' => $this->position_category,
            'status' => '1',
        ];
    }
    
    /*=====  End of Create Officer Section  ======*/
    

    /*====================================================
    =            Organization Specific Filter            =
    ====================================================*/
    
    // public function specificOrganization()
    // {
    //     $this->authUser = Auth::id();
    //     $this->user = User::find($this->authUser);
    //     $this->OrgDataFromUser = $this->user->organizations->first();
    //     // dd($this->OrgDataFromUser->id);
    //     if($this->OrgDataFromUser){
    //         $this->orgUserId = $this->OrgDataFromUser->organizations_id;
    //         $this->userOrganization = $this->OrgDataFromUser->organization_name;
    //         // dd($this->orgUserId);
    //         $this->orgCount = true;
    //         // dd($this->orgCount);
    //         // dd(DB::table('organizations')->where('organizations_id', '=', $this->orgUserId)->get());
    //         return DB::table('organizations')
    //        ->where('organizations_id', '=', $this->orgUserId)
    //        ->get();



    //     }else{
    //         $this->orgCount = false;
    //         return DB::table('organizations')
    //        ->where('status', '=', '1')
    //        ->get();            
    //         // dd("2");
    //     }
    //     // dd($this->orgUserId);
    //     // $this->organizationUserData = Organization::find($this->orgUserId);        
    //     // return $this->organizationUserData;
    //     // dd(gettype(Organization::where($this->orgUserId)));
    //     // return Organization::where($this->orgUserId);
                
    //     // dd($this->organizationUserData);
    //     // dd(gettype($this->OrgDataFromUser));        

    //     // $this->user = User::find($this->userId);
    //     // dd($this->OrgDataFromUser->organization_name);
    // }

    // /**
    //  *
    //  * Get User Role
    //  *
    //  */
    // public function getAuthUserRole()
    // {
    //     $this->authUserId = Auth::id();
    //     $this->authUserData = User::find($this->authUserId);        
    //     $this->authUserRole = $this->authUserData->roles->first();
    //     $this->authUserRoleType = $this->authUserRole->role_name;         
    //     // dd($this->authUserRoleType);
    //     // dd($this->authUserRoleType);
    //     return $this->authUserRoleType;
    // }

    /**
     *
     * Get Organization Data from database
     *
     */
    public function getOfficerData()
    {
        return DB::table('officers')
                    ->where('status','=','1')
                    ->paginate(10);
    }
    
    /*=====  End of Organization Specific Filter  ======*/
    

    public function render()
    {
        return view('livewire.officers',[
            'OfficerData' => $this->getOfficerData(),
            'getAuthUserRole' => $this->userRole,
            // 'userAuthRole' => $this->getAuthUserRole(),
            // 'posts' => $this->specificOrganization(),
            // 'userAffliatedOrganization' => $this->specificOrganization(),
        ]);
    }
}
