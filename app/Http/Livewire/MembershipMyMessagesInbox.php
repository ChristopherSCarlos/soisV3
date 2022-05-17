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
class MembershipMyMessagesInbox extends Component
{ 
    use WithPagination;

    private $organizationID;
    private $organizationData;

    public function get_data_from_db()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;
            return DB::table('membership_messages')->join('organizations','organizations.organization_id','=','membership_messages.organization_id')
                ->where('user_id',Auth::id())
                ->orderBy('message_id','DESC')
                ->paginate(6);
    }
    public function render()
    {
        return view('livewire.membership-my-messages-inbox',[
            'list_data_from_db' => $this->get_data_from_db(),
        ]);
    }
}
