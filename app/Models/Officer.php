<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Officer;

class Officer extends Model
{
    use HasFactory;

    protected $primaryKey = 'officer_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'organization_id',
        'school_year',
        'semester',
        'position_title_id',
        'term_end',
        'term_start',
        'status',
        'officer_signature',
    ];
}
