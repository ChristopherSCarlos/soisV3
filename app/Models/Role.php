<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    /**
     *
     * This is the primary key
     *
     */
    protected $primaryKey = 'role_id';

   protected $fillable = [
        'role',
        'description',
        'craeted_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'role_user','role_id','user_id','organization_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
    }
}
