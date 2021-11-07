<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\NavigationMenu;

class NavigationMenuType extends Model
{
    use HasFactory;

    protected $primaryKey = 'navigation_menu_types_id';

    protected $fillable = [
        'navigation_menu_type',
        'navigation_menu_description',
        'status',
    ];


    public function navigationMenu()
    {
        return $this->belongsToMany(NavigationMenu::class,'navigation_menus_navigation_types','navigation_menu_id','navigation_type_id');
    }

}
