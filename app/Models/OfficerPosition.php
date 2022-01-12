<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficerPosition extends Model
{
    use HasFactory;

    protected $primaryKey = 'officer_positions_id';

    protected $fillable = [
        'officer_positions_id',
        'position_category',
        'status',
    ];

}
