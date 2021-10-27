<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $primaryKey = 'permissions_id';

    protected $fillable = [
        'permission_name',
        'guard_name',
        'permission_description',
        'status',
    ];

}
