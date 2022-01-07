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
class OrgOfficers extends LivewireDatatable
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

    public $userId;
    public $userData;
    public $userOrganizationData;

    public $orgUserId;

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
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('last_name')
                ->label('Last Name')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('middle_name')
                ->label('Middle Name')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('suffix')
                ->label('suffix')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('organization_id')
                ->label('Organization ID'),
                // ->filterable()
                // ->filterOn($this->orgUserId)
                // ->where($this->orgUserId)
                // ->editable(),

            Column::name('organizations.organization_name')
                ->label('Organization')
                ->filterable($this->organizations),
                // ->filterable(cs)
                // ->editable(),
                // ->searchable(),

            Column::name('school_year')
                ->label('School Year')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('semester')
                ->label('Semester')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('position')
                ->label('Position')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            DateColumn::name('exp_date')
                ->label('Retirement')
                ->filterable(),
                // ->editable(),
                // ->searchable(),

            Column::name('position_category')
                ->label('Position Category ID'),
                // ->editable(),

            Column::name('officer_positions.position_category')
                ->label('Position Category')
                ->filterable($this->PositionCategory),
                // ->editable(),
                // ->searchable(),

            BooleanColumn::name('status')
                ->label('status')
                ->filterable(),
                // ->editable(),

            

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
    
    public function getOfficerPositionsFromDatabase()
    {
        return DB::table('officer_positions')->where('status','=','1')->get();
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
    
}

class OrgOfficerTable extends LivewireDatatable
{
    public function builder()
    {
        $this->specificOrganization();
        dd($this);
        // return Officers::query();


        // public function builder() { $agent = OrderFaxing::where('order_faxing.agent_id', auth()->user()->id); return $agent; }
        // return Officers::where('');

        $otable = Officers::where('Officers.organization_id', $this->orgUserId);
        return $otable;

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
            // $orgUserId = $this->orgUserId;
            // dd($this->orgCount);
            // dd(DB::table('organizations')->where('organizations_id', '=', $this->orgUserId)->get());
           //  return DB::table('organizations')
           // ->where('organizations_id', '=', $this->orgUserId)
           // ->get();
        }
    // dd($this);
    return $this;
    }

}