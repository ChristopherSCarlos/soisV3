<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NavigationMenuType extends Model
{
    use HasFactory;

    protected $primaryKey = 'navigation_menu_types_id';

    protected $fillable = [
        'navigation_menu_type',
        'navigation_menu_description',
        'status',
    ];


}
