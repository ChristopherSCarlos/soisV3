<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicMember extends Model
{
    use HasFactory;

    protected $primaryKey = 'academic_member_id';

    protected $fillable = [
        'academic_member_id',
        'organization_id',
        'first_name',
        'middle_name',
        'last_name',
        'student_number',
        'course',
        'email',
        'date_of_birth',
        'control_number',
        'address',
        'created_at',
        'updated_at',
    ];


}

