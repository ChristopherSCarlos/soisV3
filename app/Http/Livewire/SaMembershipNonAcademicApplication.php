<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\NonAcademicMembership;

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

class SaMembershipNonAcademicApplication extends Component
{
    use WithPagination;

    private $organizationID;
    private $organizationData;

    public function get_non_acads_membership_stats_from_db()
    {
        // dd(
            // NonAcademicApplications::join('non_academic_membership','non_academic_membership.non_academic_membership_id','=','non_academic_applications.membership_id')
            return DB::table('non_academic_applications')->join('non_academic_membership','non_academic_membership.non_academic_membership_id','=','non_academic_applications.membership_id')
                            ->join('organizations','organizations.organization_id','=','non_academic_membership.organization_id')
                            ->where('user_id',Auth::id())
                            ->orderBy('application_id','DESC')
                            ->paginate(10);
                            // ->get()
        // );
    }

    public function get_non_acads_membership_from_db()
    {
        // dd("get_non_acads_membership_from_db");
        // dd(
        return NonAcademicMembership::join('organizations','organizations.organization_id','=','non_academic_membership.organization_id')
                            ->orderBy('non_Academic_membership_id','DESC')
                            ->paginate(5);
                            // ->get()
        // );
    }
    public function render()
    {
        return view('livewire.sa-membership-non-academic-application',[
            'list_non_acads_membership_from_db' => $this->get_non_acads_membership_from_db(),
            'list_non_acads_membership_stats_from_db' => $this->get_non_acads_membership_stats_from_db(),
        ]);
    }
}
