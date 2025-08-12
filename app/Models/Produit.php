<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Menu;

class Produit extends Model
{
  

    protected $fillable = [
        'title',
        'menu_id',
        'model_type',
        'image_title',
        'image',
        'content',
    ];

    protected $casts = [
        'model_type' => 'string'
    ];

   
   
}
