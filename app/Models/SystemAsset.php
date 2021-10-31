<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemAsset extends Model
{
    use HasFactory;

    protected $primaryKey = 'system_assets_id';

    protected $fillable = [
        'asset_type',
        'asset_name',
        'is_latest_logo',
        'is_latest_banner',
        'user_id',
        'page_type_id',
        'organization_id',
    ];
}
