<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
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
        $posts = Post::all();
        return response()->json(['msg' => 'Data post berhasil tampil', 'posts' => $posts]);
    }

    public function detailPost($id)
    {
        $post = Post::where('id', $id)->get();
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
        $image = Image::where('id', $id)->get();
        return response()->json(['msg' => 'Data post berhasil tampil', 'image' => $image]);
    }
}
