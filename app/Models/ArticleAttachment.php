<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'name', 'photo'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
