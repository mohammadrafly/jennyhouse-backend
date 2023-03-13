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
    // USER
    public function getUser()
    {
        $users = User::all();
        return response()->json(['msg' => 'All Data User Berhasil Tampil', 'users' => $users]);
    }

    public function detailUser($id)
    {
        $user = User::where('id', $id)->get();
        return response()->json(['msg' => 'Data user dengan ID ' . $id . ' berhasil tampil !', 'user' => $user]);
    }

    // POST
    public function getPost()
    {
        $posts = Post::with('products')->get();
        return response()->json(['msg' => 'Data post berhasil tampil', 'posts' => $posts]);
    }

    public function detailPost($id)
    {
        $post = Post::with('products')->find($id);
        return response()->json(['msg' => 'Data post berhasil tampil', 'post' => $post]);
    }


    // CATEGORY
    public function getCategory()
    {
        $categories = Category::all();
        return response()->json(['msg' => 'Data category berhasil tampil', 'images' => $categories]);
    }

    public function detailCategory($id)
    {
        $categori = Category::find($id);
        return response()->json(['msg' => 'Data category berhasil tampil', 'image' => $categori]);
    }

    // PRODUCT
    public function getProduct()
    {
        $products = Product::with('posts')->get();
        return response()->json(['msg' => 'Data product berhasil tampil', 'images' => $products]);
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        return response()->json(['msg' => 'Data product berhasil tampil', 'image' => $product]);
    }

    //-join posts+categories where published TRUE
    public function getPublished()
    {
        $published = Post::with('products')->where('published', 1)->get();
        return response()->json(['msg' => 'success', 'posts' => $published]);
    }

    // -join posts+categories+product where posts.slug $params
    public function getPostSlug($slug)
    {
        $posts = Post::with('products')->where('slug', $slug)->get();

        if ($posts->count() > 0) {
            return response()->json(['msg' => 'success', 'posts' => $posts]);
        } else {
            return response()->json(['msg' => 'error', 'error' => 'Post not found']);
        }
    }

    // -join posts+categories where categories.title $params
    public function getPostCategory($name)
    {
        $category = Category::where('name', $name)->first();
        $posts = Post::with('category')->where('category_id', $category->id)->get();
        return response()->json(['msg' => 'success', 'posts' => $posts]);
    }
}
