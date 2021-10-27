<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'semester',
        'school_year',
        'course',
        'organization',
        'date',
        'end_date',
        'time',
        'name_of_activity',
        'participants',
        'sponsor',
        'venue',
        'type_of_activity',
        'projected_budget',
        'status',
        'user_id',
        'isEventFeat',
    ];
}
