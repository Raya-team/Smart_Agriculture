<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    public function land()
    {
        return $this->belongsTo(Land::class);
    }
    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }

    public function scopeCreatedAtDesc($query)
    {
        return $query->orderBy('created_at','DESC');
    }
}
