<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'articles_id';

    protected $fillable = [
        'article_title',
        'article_subtitle',
        'article_content',
        'type',
        'status',
        'image',
        'user_id',
        'article_slug',
        'is_featured_in_newspage',
        'is_article_featured_landing_page',
        'is_article_featured_home_page',
        'is_article_top_news_organization_page',
        'is_article_featured_organization_page',
        'is_carousel_homepage',
        'is_carousel_org_page',
        'organization_id',
        'article_type_id',
    ];
}
