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
    protected $primaryKey = 'role_id';

   protected $fillable = [
        'role_name',
        'role_description',
        'guard_name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'role_user','role_id','user_id','organization_id');
    }
}
