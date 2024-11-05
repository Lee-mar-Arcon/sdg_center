<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Metric extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_category',
        'sdg_id'
    ];

    public function indicators(): HasMany
    {
        return $this->hasMany(Indicator::class);
    }
}
