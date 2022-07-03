<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Storage;

use App\Http\Livewire\Announcements;

use App\Models\User;
use App\Models\Officer;
use App\Models\Organization;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

use Livewire\WithPagination;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\STR;
use Intervention\Image\ImageManager;

use Auth;

// class Officers extends LivewireDatatable
class createofficers extends Component
{
    use WithPagination;
    use WithFileUploads; 

    // public $model = Officer::class;
    // public $afterTableSlot = 'create-officers';

    public $exportable = true;
    public $hideable = 'select';

    public $CreatemodalFormVisible = false;
    public $updatemodalFormVisible = false;
    public $modelConfirmDeleteVisible = false;

    private $role;
    private $userRole;

    public $first_name;
    public $last_name;
    public $middle_name;
    public $suffix;
    public $organization_id;
    public $school_year;
    public $semester;
    public $position;
    public $exp_date;
    public $position_category;
    public $status;
    public $officer_signature;
    public $authUser;
    public $user;
    public $OrgDataFromUser;
    public $orgUserId;
    public $userOrganization;
    public $orgCount;
    public $position_title_id;
    public $term_start;
    public $term_end;

    public $fileName;

    public $userId;
    public $userData;
    public $userOrganizationData;

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'suffix' => 'nullable',
            'organization_id' => 'required',
            'school_year' => 'required',
            'semester' => 'required',
            'position' => 'required',
            'term_start' => 'required',
            'term_end' => 'required',
            'officer_signature' => 'nullable',
        ];
    }

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


    // public function FunctionName($value='')
    // {
    //     // code...
    // }

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
        // $this->validate();
        // dd($this);
        // $this->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'middle_name' => 'required',
        //     'suffix' => 'nullable',
        //     'organization_id' => 'required',
        //     'school_year' => 'required',
        //     'semester' => 'required',
        //     'position_title_id' => 'required',
        //     'term_end' => 'required',
        //     'term_start' => 'required',
        //     // 'position_category' => 'required',
        //     // 'officer_signature' => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
        // ]);

        // $this->fileName = time().'.'.$this->officer_signature->extension();  

       
        // $this->officer_signature->store('files', 'imgfolder',$this->fileName);

        // $this->officer_signature->storeAs('files',$this->fileName, 'imgfolder');

        // dd($this);
        Officer::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'organization_id' => $this->organization_id,
            'position_title_id' => $this->position_title_id,
            'term_end' => $this->term_end,
            'term_start' => $this->term_start,
            // 'position_category' => $this->position_category,
            // 'officer_signature' => $this->officer_signature,
            'status' => '1',
        ]);

        // Officer::create($this->modelCreateOfficer());
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
            'position_title_id' => $this->position_title_id,
            'term_end' => $this->term_end,
            'term_start' => $this->term_start,
            // 'position_category' => $this->position_category,
            // 'officer_signature' => $this->officer_signature,
            'status' => '1',
        ];
    }
    
    /*=====  End of Create Officer Section  ======*/
    
    /*==============================================
    =            Update Officer Section            =
    ==============================================*/
    
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->updatemodalFormVisible = true;
        $this->officers_id = $id;
        $this->loadModel();
    }

    public function loadModel()
    {
        // dd($this);
        $data = officer::find($this->officers_id);
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->middle_name = $data->middle_name;
        $this->suffix = $data->suffix;
        $this->organization_id = $data->organization_id;
        $this->school_year = $data->school_year;
        $this->semester = $data->semester;
        $this->position_title_id = $data->position_title_id;
        $this->term_end = $data->term_end;
        $this->term_start = $data->term_start;
        $this->position_category = $data->position_category;
    }

    public function update()
    {
        // dd($this);
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'suffix' => 'nullable',
            'organization_id' => 'required',
            'school_year' => 'required',
            'semester' => 'required',
            'position_title_id' => 'required',
            'term_end' => 'required',
            'term_start' => 'required',
            'position_category' => 'required',
        ]);
        officer::find($this->officers_id)->update($this->modelData());
        $this->updatemodalFormVisible = false;
    }
    
    /*=====  End of Update Officer Section  ======*/

    /*==============================================
    =            Delete Officer Section            =
    ==============================================*/
    
    public function deleteShowModal($id)
    {
        $this->officers_id = $id;
        $this->modelConfirmDeleteVisible = true;
    }

    public function delete()
    {
        officer::find($this->officers_id)->update(['status'=>'0']);
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    /*=====  End of Delete Officer Section  ======*/
    
    
    /*==========================================
    =            Model Data Section            =
    ==========================================*/
    
    public function modelData()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'organization_id' => $this->organization_id,
            'school_year' => $this->school_year,
            'semester' => $this->semester,
            'position_title_id' => $this->position_title_id,
            'term_start' => $this->term_start,
            'term_end' => $this->term_end,
            'position_category' => $this->position_category,
        ];
    }
    
    /*=====  End of Model Data Section  ======*/
    

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

    /*==============================================
    =            calling tables section            =
    ==============================================*/
    
    /*=====================================
    =            Get Positions            =
    =====================================*/
    
    public function getPositionsFromDatabase()
    {
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
    
    /*=====  End of Get Positions  ======*/
    


    /*=====  End of calling tables section  ======*/

    /*================================================
    =            Get Organization Section            =
    ================================================*/
    
    public function getOrganizationsFromDatabase()
    {
        return DB::table('organizations')->where('status','=','1')->get();
    }
    
    /*=====  End of Get Organization Section  ======*/

    /*=====================================================
    =            Get Position Category Section            =
    =====================================================*/
    
    public function getOfficerPositionsFromDatabase()
    {
        // return DB::table('officer_positions')->where('status','=','1')->get();
        return DB::table('position_titles')->get();
    }
    
    /*=====  End of Get Position Category Section  ======*/
    

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
        return view('livewire.createofficers',[
            'OfficerData' => $this->getOfficerData(),
            'getOrganization' => $this->getOrganizationsFromDatabase(),
            'getOfficerPosition' => $this->getOfficerPositionsFromDatabase(),
            'PositionTitlesData' => $this->getPositionsFromDatabase(),
            'OrganizationPositions' => $this->specificOrganization(),
            'getAuthUserRole' => $this->userRole,
            // 'userAuthRole' => $this->getAuthUserRole(),
            // 'posts' => $this->specificOrganization(),
            // 'userAffliatedOrganization' => $this->specificOrganization(),
        ]);
    }
}
