<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationAsset extends Model
{
    use HasFactory;


    protected $primaryKey = 'organization_asset_id';

    protected $fillable = [
            'organization_id',
            'asset_type_id',
            'file',
            'asset_name',
            'is_latest_logo',
            'is_latest_banner',
            'is_latest_image',
            'user_id',
            'page_type_id',
            'status',
            'announcement_id',
            'articles_id',
    ];
}
