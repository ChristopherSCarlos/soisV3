<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Organization;
use App\Models\PositionTitle;
use App\Http\Livewire\Objects;

use Livewire\withPagination;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;

use Auth;

class AcademicMemberships extends Component
{
    /*TRAITS*/
    public $modalViewMembersFormVisible = false;
    /*MODALS*/
    /*VARIABLES*/
        private $role;
        private $userData;
        private $userRoleData;
        private $userRole;
        private $object;

        public $member_id;


    public function academicMembersController()
    {
        // dd(DB::table('academic_members')->get());
        return DB::table('academic_members')->where('membership_status','=','paid')->get();
    }

    public function viewAnnouncement($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->member_id = $id;
        $this->modalViewMembersFormVisible = true;
    }


    /**
     *
     * Get Role of Auth User
     *
     */
    public function getAuthRoleUser()
    {
        $this->object = new Objects();
        $this->userRole = $this->object->roles();
        // dd($this->userRole);
        return $this->userRole;

        // dd($this->role->role_name);
    }

    public function render()
    {
        return view('livewire.academic-memberships',[
            'roleUser' => $this->getAuthRoleUser(), 
            'acadsMem' => $this->academicMembersController(), 
        ]);
    }
}
