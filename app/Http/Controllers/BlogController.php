<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\ImageType;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //-join posts+categories where published TRUE
    public function getPublished()
    {
        $published = Post::with('products', 'category')->where('published', 1)->get();
        return response()->json($published);
    }

    // -join posts+categories+product where posts.slug $params
    public function getPostSlug($slug)
    {
        $post = new Post;
        $posts = $post->FindPostBySlug($slug);

        if ($posts->count() > 0) {
            return response()->json($posts);
        } else {
            return response()->json(['msg' => 'error', 'error' => 'Post not found']);
        }
    }

    // -join posts+categories where categories.title $params
    public function getPostCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::with('category')->where('category_id', $category->id)->get();
        return response()->json($posts)->header('Content-Type', 'application/json');
    }
}
