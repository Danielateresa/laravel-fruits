<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Fruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'img', 'name', 'slug', 'category_id', 'weight', 'price',
    ];

public static function createSlug($name)
{
    $fruit_slug = Str::slug($name);
    return $fruit_slug;
}

 /**
     * Get all of the posts for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}