<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'category_id',
        'name',
        'link',
        'slug',
        'image',
        'price',
        'desc'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_products', 'id', 'post_id');
        // return $this->belongsToMany(Post::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
