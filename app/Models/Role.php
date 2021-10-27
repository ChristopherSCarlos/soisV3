<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
    use HasFactory;

    /**
     *
     * This is the primary key
     *
     */
    protected $primaryKey = 'roles_id';

   protected $fillable = [
        'role_name',
        'role_description',
        'guard_name',
    ];
}
