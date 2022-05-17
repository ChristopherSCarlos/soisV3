<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoisSubGate extends Model
{
    use HasFactory;
    protected $primaryKey = 'sois_sub_gate_id';

    protected $fillable = [
        'sub_under_for',
        'sub_name',
        'sub_description',
        'sub_link',
        'status',
        'role_id',
        'user_id',
    ];
}
