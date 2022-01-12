<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NavigationMenu extends Model
{
    use HasFactory;

    protected $primaryKey = 'navigation_menus_id';

    protected $fillable = [
        'sequence',
        'type',
        'label',
        'slug',
        'is_topnav',
        'is_footer',
    ];

}
