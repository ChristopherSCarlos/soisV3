<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;

class MembershipUserManagement extends Component
{

    use WithPagination;

    private $organizationID;
    private $organizationData;

    public function get_data_from_DB()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;
        // dD($this->organizationID);
        // dD(DB::table('role_user')->where('user_id','=',Auth::id())->first());
        // dD(
                                    // ->get()
                                // );
        return User::join('courses','courses.course_id','=','users.course_id')
                                    ->join('role_user','role_user.user_id','=','users.user_id')
                                    ->join('organizations','organizations.organization_id','=','courses.organization_id')
                                    ->where('courses.organization_id',$this->organizationID)
                                    ->where('role_user.role_id', 8)
                                    ->orderBy('users.user_id','DESC')
                                    ->paginate(5);
    }

    /*

    User::join('courses','courses.course_id','=','users.course_id')
                                    ->join('role_user','role_user.user_id','=','users.user_id')
                                    ->join('organizations','organizations.organization_id','=','courses.organization_id')
                                    ->where('courses.organization_id',$organizationID)
                                    ->where('role_user.role_id', 8)
                                    ->orderBy('users.user_id','DESC')
                                    ->paginate(5);

    */
    public function render()
    {
        return view('livewire.membership-user-management',[
            'list_data_from_DB' => $this->get_data_from_DB(),
        ]);
    }
}
