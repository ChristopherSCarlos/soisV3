<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\InterfaceType;

class DefaultInterface extends Model
{
    use HasFactory;

    protected $primaryKey = 'default_interfaces_id';

    protected $fillable= [
        'interface_description',
        'interface_primary_color',
        'interface_secondary_color',
        'interface_tertiary_color',
        'interface_primary_text_color',
        'interface_secondary_text_color',
        'interface_type_id',
        'interface_name',
        'status',
    ];

}
