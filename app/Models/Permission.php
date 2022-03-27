<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role;

class Permission extends Model
{
    use HasFactory;

    protected $primaryKey = 'permission_id';

    protected $fillable = [
        // 'permission_name',
        'name',
        // 'guard_name',
        'description',
        // 'status',
        // 'description',
        'created_at',
        'updated_at',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
    }
    public function permissions()
    {
        // return $this->belongsToMany(Role::class,'role_user','role_id','user_id','organization_id');
        return $this->belongsToMany(Permission::class,'permission_user','permission_id','user_id');
        // return $this->belongsToMany(Role::class)->withPivot(['role_user','role_id','user_id',]);
    }

}
