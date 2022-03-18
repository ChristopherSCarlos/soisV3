<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicMembership extends Model
{
    use HasFactory;

    protected $primaryKey = 'academic_member_id';

    protected $fillable = [
        'position_title_id',
        'organization_id',
        'term_start',
        'term_end',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'signature',
        'status',
        'created_at',
        'updated_at',
    ];


}

