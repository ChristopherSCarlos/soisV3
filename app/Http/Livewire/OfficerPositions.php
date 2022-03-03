<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Livewire\Announcements;

use App\Models\User;
use App\Models\OfficerPosition;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

use Livewire\withPagination;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;

use Auth;

// class OfficerPositions extends LivewireDatatable
class OfficerPositions extends Component
{
    use WithPagination;

    public $CreatemodalFormVisible = false;
    public $UpdatemodalFormVisible = false;
    public $modelConfirmDeleteVisible = false;

    public $position_category;
    public $officer_positions_id;

    private $role;
    private $userRole;

    public $userId;
    public $userData;
    public $userOrganizationData;

    // public $model = OfficerPosition::class;

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
        dd($this->userOrganizationData->organization_name);
    }

    /*================================================
    =            Officer Position Section            =
    ================================================*/
    
    public function createOfficerPositionModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->CreatemodalFormVisible = true;
        // dd("hello");
    }

    public function create()
    {
        // dd($this);
        OfficerPosition::create($this->modelCreateOfficerPosition());
        $this->CreatemodalFormVisible = false;
        $this->reset(); 
        $this->resetValidation(); 
    }

    public function modelCreateOfficerPosition()
    {
        return [
            'position_category' => $this->position_category,
            'status' => '1',
        ];
    }
    
    /*=====  End of Create Officer Position Section  ======*/
    
    /*========================================================
    =            Update Officer Position Category            =
    ========================================================*/
    
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->UpdatemodalFormVisible = true;
        $this->officer_positions_id = $id;
        $this->loadModel();
    }

    public function loadModel()
    {
        $data = OfficerPosition::find($this->officer_positions_id);
        $this->position_category = $data->position_category;
        
    }

    public function update()
    {
        // dd($this);
        $this->validate([
            'position_category' => 'required',
        ]);
        OfficerPosition::find($this->officer_positions_id)->update($this->modelData());
        $this->UpdatemodalFormVisible = false;
    }

    public function modelData()
    {
        return [
            'position_category' => $this->position_category,
        ];
    }
    
    /*=====  End of Update Officer Position Category  ======*/
    
    /*================================================
    =            Delete Position Category            =
    ================================================*/
    
    public function deleteShowModal($id)
    {
        $this->officer_positions_id = $id;
        $this->modelConfirmDeleteVisible = true;
    }

    public function delete()
    {
        OfficerPosition::find($this->officer_positions_id)->update(['status'=>'0']);
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    /*=====  End of Delete Position Category  ======*/
    

    /**
     *
     * Get Organization Data from database
     *
     */
    public function getOfficerPositionData()
    {
        return DB::table('position_categories')
                    ->paginate(10);
    }
    
    /*=====  End of Organization Specific Filter  ======*/
    
    /*==============================================
    =            calling tables section            =
    ==============================================*/
    
    // public function columns()
    // {
    //     return[
    //         Column::name('position_category')
    //             ->label('Position Category')
    //             ->searchable(),


    //     ];
    // }
    
    /*=====  End of calling tables section  ======*/
    

    public function render()
    {
        return view('livewire.officer-positions',[
            'OfficerPositionData' => $this->getOfficerPositionData(),
            'getAuthUserRole' => $this->userRole,
            // 'userAuthRole' => $this->getAuthUserRole(),
            // 'posts' => $this->specificOrganization(),
            // 'userAffliatedOrganization' => $this->specificOrganization(),
        ]);
    }
}
