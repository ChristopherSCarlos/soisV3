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

class SaMembershipAcademicApplication extends Component
{
    use WithPagination;

    private $organizationID;
    private $organizationData;

    public function get_application_from_db()
    {
         return DB::table('academic_applications')->join('academic_membership','academic_membership.academic_membership_id','=','academic_applications.membership_id')
                            ->join('organizations','organizations.organization_id','=','academic_membership.organization_id')
                            ->orderBy('application_id','DESC')
                            // ->get()
                            ->paginate(10);
    }

    public function get_membership_from_db()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;
        // dd(
            return DB::table('academic_membership')->join('organizations','organizations.organization_id','=','academic_membership.organization_id')
                            ->where('academic_membership.am_status','=','Active')
                            ->where('academic_membership.registration_status','=','Open')
                            ->orderBy('academic_membership_id','DESC')
                            ->paginate(5);
                            // ->get()
        // );
    }
    public function render()
    {
        return view('livewire.sa-membership-academic-application',[
            'list_membership_from_db' => $this->get_membership_from_db(),
            'list_application_from_db' => $this->get_application_from_db(),
        ]);
    }
}
