<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoisGate extends Model
{
    use HasFactory;

    public $primaryKey = 'sois_gates_id';

    protected $fillable = [
        'user_id',
        'is_logged_in',
        'gate_key',
        'hash_key',
        'created_at',
        'updated_at',
    ];

}
