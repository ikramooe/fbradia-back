<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    public $fillable = ['form_id','answers'];
    public function form() {
        return $this->belongsTo(Form::class);
    }
}
