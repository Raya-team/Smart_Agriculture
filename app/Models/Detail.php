<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Detail extends Model
{
    use HasFactory;


//    protected $casts = [
//        'created_at' => "datetime:Y-m-d\TH:iPZ",
//        'created_at' => "datetime:U",
//    ];
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

//    public function getCreatedAtAttribute($date)
//    {
//        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
//    }

//    public function setFirstNameAttribute($date)
//    {
//        $this->created_at = Jalalian::forge($date)->format('date');
//        return Jalalian::forge($this->attributes['created_at'])->format('Y/m/d');
//    }
//    protected function serializeDate(\DateTimeInterface $date)
//    {
//        $x = $date->format('U');
//        return Jalalian::forge($x)->format('Y-m-d H:i:s');;
//        return Jalalian::forge($x);
//    }
}
