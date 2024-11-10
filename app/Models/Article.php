<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'author',
        'short_description',
        'content',
        'event_date',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sdgs()
    {
        return $this->belongsToMany(SDG::class, 'article_sdg', 'article_id', 'sdg_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
