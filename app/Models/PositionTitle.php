<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionTitle extends Model
{
    use HasFactory;

    protected $primaryKey = 'position_title_id';

    protected $fillable = [
        'position_title_id',
        'position_title',
        'organization_id',
    ];

}
