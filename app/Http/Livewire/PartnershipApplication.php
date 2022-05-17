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


class PartnershipApplication extends Component
{
    use WithPagination;

    private $org_id;
    public function get_data_from_db()
    {
        $this->org_id = DB::table('organizations')->where('organization_id','=',Auth::id())->first();
        return DB::table('upcoming_events')
                ->join('organizations','organizations.organization_id','=','upcoming_events.organization_id')
                ->where('upcoming_events.partnership_status','=','on')
                ->where('upcoming_events.organization_id','!=', $this->org_id->organization_id)
                ->orderBy('upcoming_events.upcoming_event_id','DESC')
                ->paginate(3);
    }

    public function render()
    {
        return view('livewire.partnership-application',[
            'list_data' => $this->get_data_from_db(),
        ]);
    }
}
