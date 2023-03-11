<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
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
        $posts = Post::with('images')->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function detailPost($id)
    {
        $post = Post::with('images')->find($id);
        $categories = Category::all();
        return view('admin.posts.details', ['post' => $post, 'categories' => $categories]);
    }

    public function createPost(Request $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'desc' => $request['desc'],
            'published' => $request['published'],
            'video' => $request['video'],
        ]);

        $images = [
            ['name' => 'image1', 'type' => 1],
            ['name' => 'image2', 'type' => 2],
            ['name' => 'image3', 'type' => 2],
        ];

        foreach ($images as $image) {
            $file = $request->file($image['name']);
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/posts/images/', $filename);
            Image::create([
                'image_types_id' => $image['type'],
                'post_id' => $post->id,
                'image' => $filename
            ]);
        }

        return redirect(route('post.lists'));
    }

    public function addPost()
    {
        $categories = Category::all();
        return view('admin.posts.add', ['categories' => $categories]);
    }

    public function updatePost($id, PostRequest $request)
    {
        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->published = $request->published;
        $post->video = $request->video;

        $post->save();

        $images = [
            ['name' => 'image1', 'type' => 1],
            ['name' => 'image2', 'type' => 2],
            ['name' => 'image3', 'type' => 2],
        ];

        foreach ($images as $image) {
            $file = $request->file($image['name']);
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/posts/images/', $filename);
            $post->images()->updateOrCreate([
                'image_types_id' => $image['type'],
                'post_id' => $id,
                'image' => $filename
            ]);
        }
        return redirect(route('post.lists'));
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->delete();
        return redirect(route('post.lists'));
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
