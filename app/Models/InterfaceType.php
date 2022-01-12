<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterfaceType extends Model
{
    use HasFactory;

    protected $primaryKey = 'interface_types_id';

    protected $fillable = [
        'interface_type',
        'description',
        'status',
    ];
    
}
