<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Organization extends Model
{
    use HasFactory;

    protected $primaryKey = 'organization_id';

    protected $fillable = [

        'organization_name',
        'organization_logo',
        'organization_details',
        'organization_primary_color',
        'organization_secondary_color',

        'organization_slug',
        'organization_type_id',
        'organization_acronym',
        'page_type',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'organizations_users','organization_id','user_id');
    }

}
