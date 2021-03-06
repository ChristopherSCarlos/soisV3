<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Collection;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;
// use Carbon\Carbon;

class AppointmentsCalendar extends LivewireCalendar
{
    public function events(): Collection
    {
        return Event::query()
            ->whereDate('start_date', '>=', $this->gridStartsAt)
            ->whereDate('start_date', '<=', $this->gridEndsAt)
            ->get()
            ->map(function (Event $model) {
                return [
                    'id' => $model->id,
                    'title' => $model->title,
                    'description' => $model->notes,
                    'date' => $model->start_date,
                ];
            });
    }
    

    // public function onEventClick($eventId)
    // {
    //     // return redirect()->route( route: 'admin')
    // }

    // public function onEventDropped($eventId, $year, $month, $day)
    // {
    //     Events::where('id', $eventId)
    //         ->update(['due date' => $year . '-' . $month . '-' . $day]);
    // }

}