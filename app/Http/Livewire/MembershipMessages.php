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

class MembershipMessages extends Component
{
     use WithPagination;

    private $organizationID;
    private $organizationData;

    public function get_data_from_db()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;
        // dd(
            return DB::table('membership_replies')->join('users','users.user_id','=','membership_replies.user_id')
                                    ->join('organizations','organizations.organization_id','=','membership_replies.organization_id')
                                    ->where('membership_replies.organization_id', $this->organizationID)
                                    ->orderBy('reply_id','DESC')
                                    ->paginate(7);
                                    // ->get()
        // );
    }
    public function render()
    {
        return view('livewire.membership-messages',[
            'list_data_from_db' => $this->get_data_from_db(),
        ]);
    }
}
