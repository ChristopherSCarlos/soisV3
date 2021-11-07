<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoisLink extends Model
{
    use HasFactory;

    protected $primaryKey = 'sois_links_id';

    protected $fillable = [
        'link_name',
        'link_description',
        'external_link',
        'status',
    ];
}
