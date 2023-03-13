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
}
