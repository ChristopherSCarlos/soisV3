<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficerPosition extends Model
{
    use HasFactory;

    protected $primaryKey = 'position_category_id';

    protected $fillable = [
        'position_category',
    ];

}
