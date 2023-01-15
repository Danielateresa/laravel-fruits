<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'img', 'name', 'slug', 'weight', 'price',
    ];

public static function createSlug($name)
{
    $fruit_slug = Str::slug($name);
    return $fruit_slug;
}
}