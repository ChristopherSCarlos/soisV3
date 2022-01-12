<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Livewire\Announcements;

use App\Models\User;
use App\Models\Officer;
use App\Models\Organization;
use App\Models\OfficerPosition;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

use Livewire\withPagination;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Auth;

// class Officers extends Component
class Officers extends LivewireDatatable
{
    use WithPagination;

    // public $complex = true;

    public $model = Officer::class;
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

    public $userId;
    public $userData;
    public $userOrganizationData;

    // public function rules()
    // {
    //     return [
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'middle_name' => 'required',
    //         'suffix' => 'nullable',
    //         'organization_id' => 'required',
    //         'school_year' => 'required',
    //         'semester' => 'required',
    //         'position' => 'required',
    //         'exp_date' => 'required',
    //         'position_category' => 'required',
    //     ];
    // }

    // public function mount()
    // {
    //     $this->role  = new Announcements();
    //     $this->userRole = $this->role->getAuthRoleUser();
    // }

    // public function org()
    // {
    //     $this->userId = Auth::id();
    //     $this->userData = User::find($this->userId);
    //     // dd($this->userData->name);
    //     // dd($this->userData->organizations);
    //     // $this->userOrganizationData = $this->userData->organizations->get();
    //     // dd($this->userOrganizationData->organization_name);
    // }


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
        $this->validate();
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
    
    /*==============================================
    =            Update Officer Section            =
    ==============================================*/
    
    // public function updateShowModal($id)
    // {
    //     $this->resetValidation();
    //     $this->reset();
    //     $this->updatemodalFormVisible = true;
    //     $this->officers_id = $id;
    //     $this->loadModel();
    // }

    // public function loadModel()
    // {
    //     // dd($this);
    //     $data = officer::find($this->officers_id);
    //     $this->first_name = $data->first_name;
    //     $this->last_name = $data->last_name;
    //     $this->middle_name = $data->middle_name;
    //     $this->suffix = $data->suffix;
    //     $this->organization_id = $data->organization_id;
    //     $this->school_year = $data->school_year;
    //     $this->semester = $data->semester;
    //     $this->position = $data->position;
    //     $this->exp_date = $data->exp_date;
    //     $this->position_category = $data->position_category;
    // }

    // public function update()
    // {
    //     // dd($this);
    //     $this->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'middle_name' => 'required',
    //         'suffix' => 'nullable',
    //         'organization_id' => 'required',
    //         'school_year' => 'required',
    //         'semester' => 'required',
    //         'position' => 'required',
    //         'exp_date' => 'required',
    //         'position_category' => 'required',
    //     ]);
    //     officer::find($this->officers_id)->update($this->modelData());
    //     $this->updatemodalFormVisible = false;
    // }
    
    /*=====  End of Update Officer Section  ======*/

    /*==============================================
    =            Delete Officer Section            =
    ==============================================*/
    
    // public function deleteShowModal($id)
    // {
    //     $this->officers_id = $id;
    //     $this->modelConfirmDeleteVisible = true;
    // }

    // public function delete()
    // {
    //     officer::find($this->officers_id)->update(['status'=>'0']);
    //     $this->modelConfirmDeleteVisible = false;
    //     $this->resetPage();
    // }
    
    /*=====  End of Delete Officer Section  ======*/
    
    
    /*==========================================
    =            Model Data Section            =
    ==========================================*/
    
    // public function modelData()
    // {
    //     return [
    //         'first_name' => $this->first_name,
    //         'last_name' => $this->last_name,
    //         'middle_name' => $this->middle_name,
    //         'suffix' => $this->suffix,
    //         'organization_id' => $this->organization_id,
    //         'school_year' => $this->school_year,
    //         'semester' => $this->semester,
    //         'position' => $this->position,
    //         'exp_date' => $this->exp_date,
    //         'position_category' => $this->position_category,
    //     ];
    // }
    
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

    /*===========================================
    =            Join tables Section            =
    ===========================================*/
    
    public function builder()
    {
        return Officer::query()
            ->leftJoin('organizations', 'organizations.organization_id', 'officers.organization_id');
            // ->leftJoin('officer_positions', 'officer_positions.officer_positions_id', 'officers.position_category');
    }
    
    /*=====  End of Join tables Section  ======*/
    

    /*==============================================
    =            calling tables section            =
    ==============================================*/
    
    public function columns()
    {
        // dd(co);
        return[
            // Column::checkbox('officers_id'),

            NumberColumn::name('officers_id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('officers_id'),

            Column::name('first_name')
                ->label('First Name')
                ->filterOn('officers.first_name')
                ->filterable()
                ->editable(),
                // ->searchable(),

            Column::name('last_name')
                ->label('Last Name')
                ->filterable()
                ->editable(),
                // ->searchable(),

            Column::name('middle_name')
                ->label('Middle Name')
                ->filterable()
                ->editable(),
                // ->searchable(),

            Column::name('suffix')
                ->label('suffix')
                ->filterable()
                ->editable(),
                // ->searchable(),

            Column::name('organization_id')
                ->label('Organization ID')
                ->editable(),

            Column::name('organizations.organization_name')
                ->label('Organization')
                ->filterable($this->organizations),
                // ->filterable(cs)
                // ->editable(),
                // ->searchable(),

            Column::name('school_year')
                ->label('School Year')
                ->filterable()
                ->editable(),
                // ->searchable(),

            Column::name('semester')
                ->label('Semester')
                ->filterable()
                ->editable(),
                // ->searchable(),

            Column::name('position')
                ->label('Position')
                ->filterable()
                ->editable(),
                // ->searchable(),

            DateColumn::name('exp_date')
                ->label('Retirement')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('position_category')
                ->label('Position Category ID')
                ->editable(),

            Column::name('officer_positions.position_category')
                ->label('Position Category')
                ->filterable($this->PositionCategory)
                ->editable(),
                // ->searchable(),

            BooleanColumn::name('status')
                ->label('status')
                ->filterable(),
                // ->editable(),

            Column::delete('officers_id')
                ->label('delete'),

            

        ];
    }
    
    /*=====  End of calling tables section  ======*/

    /*===================================================
    =            Retrieve Data from database            =
    ===================================================*/
    
    public function getOrganizationsProperty()
    {
        return Organization::pluck('organization_name');
    }

    public function getPositionCategoryProperty()
    {
        return OfficerPosition::pluck('position_category');
    }
    
    /*=====  End of Retrieve Data from database  ======*/
    

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
    
    // public function getOfficerPositionsFromDatabase()
    // {
    //     return DB::table('officer_positions')->where('status','=','1')->get();
    // }
    
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
    

    // public function render()
    // {
    //     return view('livewire.officers',[
    //         'OfficerData' => $this->getOfficerData(),
    //         'getOrganization' => $this->getOrganizationsFromDatabase(),
    //         'getOfficerPosition' => $this->getOfficerPositionsFromDatabase(),
    //         'getAuthUserRole' => $this->userRole,
    //         // 'userAuthRole' => $this->getAuthUserRole(),
    //         // 'posts' => $this->specificOrganization(),
    //         // 'userAffliatedOrganization' => $this->specificOrganization(),
    //     ]);
    // }
}

class OrgTable extends LivewireDatatable
{
    public function builder()
    {
        $this->specificOrganization();
        return Officers::query()
            ->where('organization_id', '=', $this->orgUserId);
    }

    public function filterTable($customerId)
    {
        $this->customerId = $customerId;
        $this->refreshLivewireDatatable();
    }

    public function specificOrganization()
    {
        $this->authUser = Auth::id();
        $this->user = User::find($this->authUser);
        $this->OrgDataFromUser = $this->user->organizations->first();
        // dd($this->OrgDataFromUser->id);
        if($this->OrgDataFromUser){
            $this->orgUserId = $this->OrgDataFromUser->organizations_id;
            $this->userOrganization = $this->OrgDataFromUser->organization_name;
            // dd($this->orgUserId);
            $this->orgCount = true;
            // dd($this->orgCount);
            // dd(DB::table('organizations')->where('organizations_id', '=', $this->orgUserId)->get());
           //  return DB::table('organizations')
           // ->where('organizations_id', '=', $this->orgUserId)
           // ->get();
        }
    }

}