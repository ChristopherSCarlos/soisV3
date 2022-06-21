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

class SaMembershipMembers extends Component
{
    use WithPagination;

    private $organizationID;
    private $organizationData;

    public function get_data_from_db()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;
        // dd(
            // return DB::Table('academic_members')->where('organization_id',$this->organizationID)
             // DB::Table('academic_members')->where('organization_id',$this->organizationID)
              return DB::Table('academic_members')->join('academic_membership','academic_membership.academic_membership_id','=','academic_members.membership_id')
                ->where('academic_members.membership_status','=','paid')
                ->orderBy('academic_member_id','DESC')
                ->paginate(5);
                // ->get()
        // );
    }
    public function render()
    {
        return view('livewire.sa-membership-members',[
            'list_data_from_db' => $this->get_data_from_db(),
        ]);
    }
}
