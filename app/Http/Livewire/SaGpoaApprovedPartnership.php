<?php

namespace App\Http\Livewire;

use Livewire\Component;
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

class SaGpoaApprovedPartnership extends Component
{
    use WithPagination;

    private $org_id;
    public function getDataFromDB()
    {
        $this->org_id = DB::table('organizations')->where('organization_id','=',Auth::id())->first();
        // dd($this->org_id->organization_id);
        // dd(DB::table('partnership_requests')->where()->get());
        return DB::table('partnership_requests')
            ->join('upcoming_events','upcoming_events.upcoming_event_id','=','partnership_requests.event_id')
            ->join('organizations','organizations.organization_id','=','partnership_requests.request_by')
            ->where('partnership_requests.request_status','=','pending')
            ->orderBy('partnership_requests.event_id','DESC')
            ->paginate(3);
    }
    public function render()
    {
        return view('livewire.sa-gpoa-approved-partnership',[
            'list_data' => $this->getDataFromDB(),
        ]);
    }
}
