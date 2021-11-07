<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\NavigationMenuType;

class NavigationMenu extends Model
{
    use HasFactory;

    protected $primaryKey = 'navigation_menus_id';

    protected $fillable = [
        'sequence',
        'type',
        'label',
        'slug',
    ];

    public function navigationType()
    {
        return $this->belongsToMany(NavigationMenuType::class,'navigation_menus_navigation_types','navigation_menu_id','navigation_type_id');
    }
}
