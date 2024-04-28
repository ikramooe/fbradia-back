<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public $casts = [
        'chrono'=>'date'
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
