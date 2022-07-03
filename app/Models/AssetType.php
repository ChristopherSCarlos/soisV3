<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use HasFactory;

    protected $primaryKey = 'asset_types_id';

    protected $fillable = [
        'type',
        'asset_type_description',
        'status',
    ];
}
