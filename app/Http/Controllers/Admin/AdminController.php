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
use App\Models\PostProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $post = new Post;
        $posts = $post->PostProductAndCats();
        //dd($posts);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function detailPost($id)
    {
        $model = new Post();
        $post = $model->AssociateItem($id);
        $productAll = Product::all();
        $categories = Category::all();
        //dd($post);
        return view('admin.posts.details', [
            'post' => $post, 
            'categories' => $categories, 
            'productAll' => $productAll
        ]);
    }

    public function createPost(Request $request)
    {
        $file = $request->file('image');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = Str::random(20). '.'. $fileExtension;
        $file->move(public_path('uploads/'), $fileName);
        $product_id = $request->input('product_id');
        $data = [
            'user_id' => auth()->user()->id,
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'slug' => $request['slug'],
            'content' => htmlspecialchars($request['content']),
            'image' => $fileName,
            'published' => $request['published'],
        ];

        if (Post::create($data)) {
            $id = Post::where('title', $data['title'])->first();
            $data = [];
            for ($i=0; $i < count($product_id); $i++) {
                $data[$i] = [
                    'post_id' => $id['id'],
                    'product_id' => $product_id[$i]
                ];
            }
            PostProduct::insert($data);
            return redirect(route('post.lists'));
        }
    }

    public function addPost()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.posts.add', ['categories' => $categories, 'products' => $products]);
    }

    public function updatePost($id, PostRequest $request)
    {
        $file = $request->file('image');
        if ($file != null) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = Str::random(20). '.'. $fileExtension;
            $file->move(public_path('uploads/'), $fileName);
            $data =[
                'user_id' => auth()->user()->id,
                'category_id' => $request['category_id'],
                'title' => $request['title'],
                'slug' => $request['slug'],
                'content' => htmlspecialchars($request['content']),
                'image' => $fileName,
                'published' => $request['published'],
            ];
            $product_id = $request->input('product_id');
            $post = Post::find($id);
            if ($post->update($data)) {
                if (PostProduct::where('post_id', $post['id'])->first()) {
                    if (PostProduct::where('post_id', $post['id'])->delete()) {
                        $id = Post::where('title', $data['title'])->first();
                        $data = [];
                        for ($i=0; $i < count($product_id); $i++) {
                            $data[$i] = [
                                'post_id' => $id['id'],
                                'product_id' => $product_id[$i]
                            ];
                        }
                        PostProduct::insert($data);
                        return redirect(route('post.lists'));
                    } else {
                        echo 'fail deleting data';
                    }
                } else {
                    $id = Post::where('title', $data['title'])->first();
                    $data = [];
                    for ($i=0; $i < count($product_id); $i++) {
                        $data[$i] = [
                            'post_id' => $id['id'],
                            'product_id' => $product_id[$i]
                        ];
                    }
                    PostProduct::insert($data);
                    return redirect(route('post.lists'));
                }
            } else {
                echo 'error';
            }
        } elseif ($file == null) {
            $data =[
                'user_id' => auth()->user()->id,
                'category_id' => $request['category_id'],
                'title' => $request['title'],
                'slug' => $request['slug'],
                'content' => htmlspecialchars($request['content']),
                'published' => $request['published'],
            ];
            $product_id = $request->input('product_id');
            $post = Post::find($id);
            //dd($post);
            if ($post->update($data)) {
                if (PostProduct::where('post_id', $post['id'])->first()) {
                    if (PostProduct::where('post_id', $post['id'])->delete()) {
                        $id = Post::where('title', $data['title'])->first();
                        $data = [];
                        for ($i=0; $i < count($product_id); $i++) {
                            $data[$i] = [
                                'post_id' => $id['id'],
                                'product_id' => $product_id[$i]
                            ];
                        }
                        PostProduct::insert($data);
                        return redirect(route('post.lists'));
                    } else {
                        echo 'fail deleting data';
                    }
                } else {
                    $id = Post::where('title', $data['title'])->first();
                    $data = [];
                    for ($i=0; $i < count($product_id); $i++) {
                        $data[$i] = [
                            'post_id' => $id['id'],
                            'product_id' => $product_id[$i]
                        ];
                    }
                    PostProduct::insert($data);
                    return redirect(route('post.lists'));
                }
            } else {
                echo 'error';
            }
        } elseif ($request->input('product_id') == null) {
            $post = Post::find($id);
            $post->save([
                'user_id' => auth()->user()->id,
                'category_id' => $request['category_id'],
                'title' => $request['title'],
                'slug' => $request['slug'],
                'content' => htmlspecialchars($request['content']),
                'published' => $request['published'],
            ]);
            return redirect(route('post.lists'));
        }
    }

    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return redirect(route('post.lists'));
    }

    // PRODUCT ===================================================
    public function getProduct()
    {
        $products = Product::with('posts')->get();
        return view('admin.products.index', ['products' => $products]);
    }

    public function detailProduct($id)
    {
        $product = Product::with('posts')->find($id);
        return view('admin.products.details', ['product' => $product]);
    }

    public function createProduct(Request $request)
    {
        $file = $request->file('image');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = Str::random(20). '.'. $fileExtension;
        $file->move(public_path('uploads/'), $fileName);
        
        Product::create([
            'category_id' => $request['category_id'],
            'name' => $request['name'],
            'link' => $request['link'],
            'slug' => $request['slug'],
            'image' => $fileName,
            'price' => $request['price'],
            'desc' => $request['desc'],
        ]);

        return redirect(route('product.lists'));
    }

    public function addProduct()
    {
        return view('admin.products.add');
    }

    public function updateProduct($id, ProductRequest $request)
    {
        $file = $request->file('image');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = Str::random(20). '.'. $fileExtension;
        $file->move(public_path('uploads/'), $fileName);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->link = $request->link;
        $product->image = $fileName;
        $product->price = $request->price;
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
