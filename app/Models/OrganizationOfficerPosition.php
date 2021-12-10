<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationOfficerPosition extends Model
{
    use HasFactory;

    protected $primaryKey = 'organization_officer_positions_id';

    protected $fillable = [
        'organization_officer_positions_id',
        'officer_position_name',
        'organization_id',
    ];

}
