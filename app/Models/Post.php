<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'image',
        'published',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'post_products', 'id', 'product_id');
    }

    public function PostProductAndCats()
    {
        return DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select(
                'posts.id as posts_id',
                'posts.title as posts_title',
                'posts.created_at as posts_date', 
                'posts.content as posts_content',
                'posts.image as posts_image',
                'posts.slug as posts_slug',
                'posts.published as posts_published',
                'posts.deleted_at as deleted_at',
                'categories.name as category_title', 
                'users.name as users_name', 
                )
            ->get();
    }

    public function AssociateItem($id)
    {
        return DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', $id)
            ->select(
                'posts.*',
                'categories.id as category_id',
                'categories.name as category_title', 
                'users.name as users_name', 
                )
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function FindPostBySlug($slug)
    {
        return DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('post_products', 'posts.id', '=', 'post_products.post_id')
            ->join('products', 'post_products.product_id', '=', 'products.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select(
                'posts.title as posts_title',
                'posts.created_at as posts_date', 
                'posts.content as posts_content',
                'posts.image as posts_image',
                'posts.slug as posts_slug',
                'categories.name as category_title', 
                'users.name as users_name', 
                'products.name as products_title',
                'products.desc as products_content',
                'products.link as products_link',
                'products.image as products_image',
                )
            ->where('posts.slug', $slug)
            ->get();
    }
}
