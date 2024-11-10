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

   public function sdgs()
   {
       return $this->hasMany(SDG::class);
   }
    public function articles()
    {
        return $this->hasMany(Article::class );
    }
}
