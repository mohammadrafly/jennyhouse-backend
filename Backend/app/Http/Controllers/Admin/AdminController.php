<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ImageTypeRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\ImageType;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // USER ===================================================
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

    // POST ===================================================
    public function getPost()
    {
        $posts = Post::with('products')->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function detailPost($id)
    {
        $post = Post::with('products')->find($id);
        $categories = Category::all();
        return view('admin.posts.details', ['post' => $post, 'categories' => $categories]);
    }

    public function createPost(Request $request)
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/posts/images/', $filename);
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'slug' => $request['slug'],
            'content' => $request['content'],
            'image' => $filename,
            'published' => $request['published'],
        ]);


        return redirect(route('post.lists'));
    }

    public function addPost()
    {
        $categories = Category::all();
        return view('admin.posts.add', ['categories' => $categories]);
    }

    public function updatePost($id, PostRequest $request)
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/posts/images/', $filename);

        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->published = $request->published;
        $post->image = $filename;

        $post->save();


        return redirect(route('post.lists'));
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->delete();
        return redirect(route('post.lists'));
    }

    // PRODUCT ===================================================
    public function getProduct()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.details', ['product' => $product, 'categories' => $categories]);
    }

    public function createProduct(Request $request)
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/products/images/', $filename);
        Product::create([
            'category_id' => $request['category_id'],
            'name' => $request['name'],
            'link' => $request['link'],
            'price' => $request['price'],
            'image' => $filename,
            'desc' => $request['desc'],
        ]);

        return redirect(route('product.lists'));
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.products.add', ['categories' => $categories]);
    }

    public function updateProduct($id, ProductRequest $request)
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/products/images/', $filename);
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->link = $request->link;
        $product->image = $filename;
        $product->desc = $request->desc;

        $product->save();

        return redirect(route('product.lists'));
    }

    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        return redirect(route('product.lists'));
    }

    // CATEGORY ===================================================

    public function getCategory()
    {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function detailCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.details', ['category' => $category]);
    }

    public function createCategory(CategoryRequest $request)
    {
        Category::create([
            'name' => $request['name'],
            'desc' => $request['desc']
        ]);
        return redirect(route('category.lists'));
    }

    public function addCategory()
    {
        return view('admin.category.add');
    }

    public function updateCategory($id, CategoryRequest $request)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return redirect(route('category.lists'));
    }

    public function deleteCategory($id)
    {
        Category::where('id', $id)->delete();
        return redirect(route('category.lists'));
    }
}
