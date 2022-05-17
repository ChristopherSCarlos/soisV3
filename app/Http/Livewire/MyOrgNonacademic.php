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

class MyOrgNonacademic extends Component
{
    public function get_data_from_DB()
    {
        // dd("get_data_from_DB");
        // dd(
        return DB::table('non_academic_members')->join('non_academic_membership','non_academic_membership.non_academic_membership_id','=','non_academic_members.membership_id')
                    ->join('organizations','organizations.organization_id','=','non_academic_membership.organization_id')
                    ->where('user_id',auth::id())
                    ->where('membership_status','paid')->orderBy('non_academic_membership.non_academic_membership_id','DESC')
                    ->paginate(3);
                    // ->get()
        // );
    }

    public function render()
    {
        return view('livewire.my-org-nonacademic',[
            'list_data_from_DB' => $this->get_data_from_DB(),
        ]);
    }
}
