<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Officer;

class Officer extends Model
{
    use HasFactory;

    protected $primaryKey = 'officers_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'organization_id',
        'school_year',
        'semester',
        'position',
        'exp_date',
        'position_category',
        'status',
        'officer_signature',
    ];
}
