<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $fillable = [
        'metric_id',
        'applied',
        'indicator',
        'evidence_1',
        'evidence_1_name',
        'evidence_2_name',
        'evidence_2',
    ];
    
    use HasFactory;
    public function metrics()
    {
        return $this->belongsTo(Metric::class);
    }
}
