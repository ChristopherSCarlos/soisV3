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


class SaGpoaPartnershipRequests extends Component
{
    use WithPagination;

    public function get_data_from_db()
    {
        return DB::table('upcoming_events')
            ->where('upcoming_events.advisers_approval','=','approved')
            ->where('upcoming_events.studAffairs_approval','=','approved')
            ->where('upcoming_events.directors_approval','=','approved')
            ->orderBy('upcoming_event_id', 'desc')
            ->paginate(3);
    }
    public function render()
    {
        return view('livewire.sa-gpoa-partnership-requests',[
            'listDataFromDB' => $this->get_data_from_db(),
        ]);
    }
}
