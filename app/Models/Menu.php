<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'url',
        'target',
        'parent_id',
        'order',
        'icon'
    ];

    protected $casts = [
        'parent_id' => 'integer',
        'order' => 'integer'
    ];

    public $translatable = ['title'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeWithChildren($query)
    {
        return $query->with('children');
    }


    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
