<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;

class SaGpoaUpcomingEvents extends Component
{
     use WithPagination;

    public function getDataFromDB()
    {
        // dd(DB::table('upcoming_events')->get());
        return DB::table('upcoming_events')->paginate(3);
    }
    public function render()
    {
        return view('livewire.sa-gpoa-upcoming-events',[
            'list_upcoming_events' => $this->getDataFromDB(),
        ]);
    }
}
