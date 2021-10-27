<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Tag extends Model
{
    use HasFactory;
    protected $primaryKey = 'tags_id';

    protected $fillable = [
        'tags_name',
        'tags_description',
        'tags_type',
        'user_id',
        'status',
    ];
}
