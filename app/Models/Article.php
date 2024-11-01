<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = [
        'title',
        'category_id',
        'author',
        'short_description',
        'content',
        'event_date'
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function attachments()
    {
        return $this->hasMany(ArticleAttachment::class);
    }

    public function sdgs()
    {
        return $this->belongsToMany(SdgCategory::class, 'article_has_sdg');
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
=======
    protected $table = 'articles';
    protected $primaryKey = 'article_id';

    protected $fillable = [
        'article_title',
        'author',
        'short_description',
        'content',
        'event_date',
    ];
>>>>>>> origin/Rean
}
