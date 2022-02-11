<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Announcement extends Model
{
    use HasFactory;

    protected $primaryKey = 'announcements_id';

    protected $fillable = [
        'announcement_title',
        'announcement_content',
        'announcement_image',
        'signature',
        'signer_position',
        'user_id',
        'status',
        'exp_date',
        'exp_time',
        'organization_id',
        'isAnnouncementInHomepage',
        'isAnnouncementInOrgpage',
        'announcement_slug',
    ];
}
