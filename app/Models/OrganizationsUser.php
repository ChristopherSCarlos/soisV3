<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class OrganizationsUser extends Model
{
    use HasFactory;

    protected $primaryKey = 'organizations_users_id';

    protected $fillable = [
        'organization_id',
        'role_id',
    ];
}
