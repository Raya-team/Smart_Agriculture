<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sensor extends Model
{
    use HasFactory,SoftDeletes;

    protected $date=['deleted_at'];

    protected $fillable = ['serial'];

    public function land()
    {
        return $this->belongsTo(Land::class);
    }
}
