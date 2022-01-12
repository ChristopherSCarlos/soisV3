<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Organization;
use App\Models\SocialMedia;

class OrgSocial extends Model
{
    use HasFactory;

    protected $primaryKey = 'org_socials_id';

    protected $fillable = [

        'org_social_link',
        'organization_id',
        'status',
        'embed_data',
        'social_id',
        'social_name',
    ];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class,'org_socials_id','organizations_id');
    }
    public function socialmedias()
    {
        return $this->belongsToMany(SocialMedia::class,'org_socials_id','social_media_id');
    }
}
