<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSDG extends Model
{
    protected $table = 'article_sdg';
    
    protected $fillable = [
        'article_id',
        'sdg_id'
    ];
}
