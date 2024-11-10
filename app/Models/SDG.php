<?php

namespace App\Models;


use App\Models\Metric;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SDG extends Model
{
    use HasFactory;

    protected $table = 'sdgs';

    protected $fillable = [
        'name',
        'description',
        'icon',
        'sdg_no',
        'bg_color',
    ];

    public function metrics(): HasMany
    {
        return $this->hasMany(Metric::class, 'sdg_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_sdg', 'sdg_id', 'article_id');
    }

}
