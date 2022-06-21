<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;


class SaGpoaDisapprovedEvents extends Component
{
    use WithPagination;

    private $organizationData;
    private $roleData;

    private $role_name;

    public function get_data_from_DB()
    {
        // dd(Auth::id());
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->roleData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd($this->organizationData->role_id);

        $this->role_name = DB::table('roles')->where('role_id','=',$this->roleData->role_id)->first(); 

        // dd($this->role->role);
        // dd($this->roleData->role_id);

        return DB::table('disapproved_events')
                ->join('upcoming_events','upcoming_events.upcoming_event_id','=','disapproved_events.upcoming_event_id')
                ->join('organizations','organizations.organization_id','=','upcoming_events.organization_id')
                // ->where('upcoming_events.organization_id',2)
                // ->join('users','users.user_id','=','disapproved_events.disapproved_by')
                ->orderBy('disapproved_event_id','DESC')
                ->paginate(5, ['*'], 'upcoming-events');
                // ->get()
    }
    public function render()
    {
        return view('livewire.sa-gpoa-disapproved-events',[
            'list_data_from_DB' => $this->get_data_from_DB(),
        ]);
    }
}
