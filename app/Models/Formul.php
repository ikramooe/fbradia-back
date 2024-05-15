<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formul extends Model
{
    use HasFactory;

    public $casts = [
        'chrono'=>'date'
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
