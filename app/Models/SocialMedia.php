<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $primaryKey = 'social_media_id';

    protected $fillable = [

        'social_media_name',
        'status',
        'embed_data',
    ];
}
