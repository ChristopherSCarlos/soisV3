<?php

namespace App\Http\Livewire;

use Auth;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\User;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;
use Illuminate\Support\Facades\DB;

class DeletedAnnouncements extends Component
{

    public $announcement_id;

        public $announcements_title;
        public $announcements_content;
        public $announcements_slug;
        public $signature;
        public $signer_position;
        public $exp_date;
        public $exp_time;
        public $organization_id;
        public $user_id;
        public $userId;
        public $status;
        public $userRolesString;
        public $announcementId;
        public $data;

        private $role;
        private $userData;
        private $userRoleData;
        private $userRole;
        private $userRoles;


        private $object;
        private $user;
        private $va;
        private $v;
        private $roles;
        private $orgID;

    /*=======================================
    =            Restore Article            =
    =======================================*/
    
    public function restore($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->announcementId = $id;


        $this->data = Announcement::find($this->announcementId);
        $this->status = $this->data->status;

        Announcement::where('announcements_id',$this->announcementId)->update([
            'status' => '1',
        ]);
    }
    
    /*=====  End of Restore Article  ======*/
    
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
        $this->userRolesString = $this->userRoles->role;
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

    /*=============================================
    =            Get User Organization            =
    =============================================*/
    
    public function getUserOrganization()
    {
        return DB::table('announcements')->where('organization_id','=',$this->userOrg())->where('status','=','0')->paginate(10);
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
    

    /*=================================================
    =            Get Deleted Articles Data            =
    =================================================*/
    
    public function getAnnouncementTableData()
    {
        $this->userId = Auth::user()->users_id;
        // dd($this->userId);
        return DB::table('announcements')
           ->where('status','=','0')
           ->paginate(5);
    }
    
    /*=====  End of Get Deleted Articles Data  ======*/
    


    public function render()
    {
        return view('livewire.deleted-announcements',[
            'deletedannouncementsDatas' => $this->getAnnouncementTableData(),
            'Organization' => $this->getUserOrganization(),
            'getOrganization' => $this->getOrganizationsFromDatabase(),
            'getAuthUserRole' => $this->getUserRole(),
        ]);
    }
}