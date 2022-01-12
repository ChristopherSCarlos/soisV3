<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemAsset extends Model
{
    use HasFactory;

    protected $primaryKey = 'system_assets_id';

    protected $fillable = [
        'asset_type_id',
        'asset_type',
        'asset_name',
        'is_latest_logo',
        'is_latest_banner',
        'user_id',
        'page_type_id',
        'organization_id',
        'status',
        'is_latest_image',
        'events_id',
        'announcements_id',
        'articles_id',
    ];
}
