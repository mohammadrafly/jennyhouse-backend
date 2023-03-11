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
        $posts = Post::with('images')->get();
        return response()->json(['msg' => 'Data post berhasil tampil', 'posts' => $posts]);
    }

    public function detailPost($id)
    {
        $post = Post::with('images')->find($id);
        return response()->json(['msg' => 'Data post berhasil tampil', 'post' => $post]);
    }

    // IMAGE
    public function getImage()
    {
        $images = Image::all();
        return response()->json(['msg' => 'Data image berhasil tampil', 'images' => $images]);
    }

    public function detailImage($id)
    {
        $image = Image::find($id);
        return response()->json(['msg' => 'Data image berhasil tampil', 'image' => $image]);
    }

    // IMAGE TYPE
    public function getImageType()
    {
        $types = ImageType::all();
        return response()->json(['msg' => 'Data image berhasil tampil', 'images' => $types]);
    }

    public function detailImageType($id)
    {
        $type = ImageType::find($id);
        return response()->json(['msg' => 'Data image berhasil tampil', 'image' => $type]);
    }

    // CATEGORY
    public function getCategory()
    {
        $categories = Category::all();
        return response()->json(['msg' => 'Data image berhasil tampil', 'images' => $categories]);
    }

    public function detailCategory($id)
    {
        $categori = Category::find($id);
        return response()->json(['msg' => 'Data image berhasil tampil', 'image' => $categori]);
    }

    // PRODUCT
    public function getProduct()
    {
        $products = Product::all();
        return response()->json(['msg' => 'Data image berhasil tampil', 'images' => $products]);
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        return response()->json(['msg' => 'Data image berhasil tampil', 'image' => $product]);
    }
}
