<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return response()->json(['msg' => 'Data User dengan ID '. $id .'Berhasil dihapus']);
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

    public function createPost(PostRequest $request)
    {
        $post = '';
        return response()->json(['msg' => 'Data post berhasil tampil', 'post' => $post]);
    }

    public function updatePost($id)
    {
        $post = Post::where('id', $id)->get();
        return response()->json(['msg' => 'Data post berhasil tampil', 'post' => $post]);
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->delete();
        return response()->json(['msg' => 'Data post berhasil dihapus']);
    }
}
