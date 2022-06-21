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
class SaGpoaAccomplishedEvents extends Component
{
    use WithPagination;

    public function getDataFromDB()
    {
        return DB::table('accomplished_events')->paginate(3);
    }
    public function render()
    {
        return view('livewire.sa-gpoa-accomplished-events',[
            'list_data_from_DB' => $this->getDataFromDB(),
        ]);
    }
}
