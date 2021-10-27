<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    
    /**
     *
     * This is the primary key
     *
     */
    protected $primaryKey = 'pages_id';

    protected $fillable = [
        'is_default_home',
        'is_default_not_found',
        'title',
        'slug',
        'content',
        'primary_color',
        'secondary_color',
        'tertiary_color',
        'quarternary_color',
        'status',
    ];
}
