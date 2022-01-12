<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageType extends Model
{
    use HasFactory;

    protected $primaryKey = 'page_types_id';

    protected $fillable = [
    'page_type',
    'page_description',
    'status',
    ];
}
