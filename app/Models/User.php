<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Role;
use App\Models\Organization;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'address',
        'mobile_number',
        'email',
        'password',
        'student_number',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles()
    {
        // return $this->belongsToMany(Role::class,'role_user','role_id','user_id','organization_id');
        return $this->belongsToMany(Role::class,'role_user','role_id','user_id')->withPivot('organization_id');
        // return $this->belongsToMany(Role::class)->withPivot(['role_user','role_id','user_id',]);
    }
    public function organizations()
    {
        return $this->belongsToMany(Role::class,'role_user','role_id','user_id')->withPivot('organization_id');
        // return $this->belongsToMany(Organization::class,'role_user','user_id','organization_id');
    }
    public function permissions()
    {
        // return $this->belongsToMany(Role::class,'role_user','role_id','user_id','organization_id');
        return $this->belongsToMany(Permission::class,'permission_user','permission_id','user_id');
        // return $this->belongsToMany(Role::class)->withPivot(['role_user','role_id','user_id',]);
    }
}
