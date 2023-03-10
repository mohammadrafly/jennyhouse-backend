<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\PostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // USER
    public function getUser()
    {
        $users = User::paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function detailUser($id)
    {
        $user = User::where('id', $id)->get()->first();
        return view('admin.users.details', ['user' => $user]);
    }

    public function updateUser($id)
    {
        $user = User::where('id', $id)->get()->first();
        return redirect(route('user-lists'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('user.lists'));
    }

    // POST
    public function getPost()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function detailPost($id)
    {
        $post = Post::where('id', $id)->get()->first();
        return view('admin.posts.details', ['post' => $post]);
    }

    public function createPost(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request['title'],
            'desc' => $request['desc'],
            'published' => $request['published'],
        ]);
        return response()->json(['msg' => 'Data post berhasil dibuat', 'post' => $post]);
    }

    public function updatePost($id, PostRequest $request)
    {
        $data = [
            'user_id' => $request['user_id'],
            'title' => $request['title'],
            'desc' => $request['desc'],
            'published' => $request['published'],
        ];
        $post = Post::where('id', $id)->update($data);
        return response()->json(['msg' => 'Data post berhasil diubah', 'post' => $post]);
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->delete();
        return response()->json(['msg' => 'Data post dengan ID ' . $id . ' berhasil dihapus']);
    }

    // IMAGE
    public function getImage()
    {
        $images = Image::paginate(10);
        return response()->json(['msg' => 'Data image berhasil tampil', 'images' => $images]);
    }

    public function detailImage($id)
    {
        $image = Image::where('id', $id)->get();
        return response()->json(['msg' => 'Data post berhasil tampil', 'image' => $image]);
    }

    public function createImage(ImageRequest $request)
    {
        $file = $request->file('image');
        $filename  = $file->getClientOriginalName();
        $file->storeAs('images/post/', $filename);
        $image = Image::create([
            'image' => $request['image'],
            'image_types_id' => $request['image_types_id'],
            'post_id' => $request['post_id'],
        ]);
        return '';
    }

    public function updateImage($id, ImageRequest $request)
    {
        $file = $request->file('image');
        $filename  = $file->getClientOriginalName();
        $file->storeAs('images/post/', $filename);
        $image = Image::create([
            'image' => $request['image'],
            'image_types_id' => $request['image_types_id'],
            'post_id' => $request['post_id'],
        ]);
        return response()->json(['msg' => 'Data image berhasil diubah', 'image' => $image]);
    }

    public function deleteImage($id)
    {
        $image = Image::where('id', $id)->delete();
        return response()->json(['msg' => 'Data image dengan ID ' . $id . ' berhasil dihapus']);
    }
}
