<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Menu;

class Page extends Model
{
    use HasTranslations;

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

    public $translatable = ['title', 'image_title', 'content','sub_title','description','main_title','description'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
