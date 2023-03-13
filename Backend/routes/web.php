<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(BlogController::class)->group(function () {

    // USER
    Route::get('/users', 'getUser');
    Route::get('/users/{id}', 'detailUser');

    // CATEGORY
    Route::get('/categories', 'getCategory');
    Route::get('/categories/{id}', 'detailCategory');

    // Post
    Route::get('/posts', 'getPost');
    Route::get('/posts/{id}', 'detailPost');

    // Product
    Route::get('/products', 'getProduct');
    Route::get('/products/{id}', 'detailProduct');

    //Get Post Published True
    Route::get('/post/published', 'getPublished');

    //Get Post With Custom Category Name
    Route::get('/post/{name}', 'getPostCategory');
});

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        // User
        Route::get('/users', 'getUser')->name('user.lists');
        Route::get('/users/{id}', 'detailUser')->name('user.details');
        Route::put('/users/{id}', 'updateUser')->name('user.update');
        Route::post('/users/{id}', 'deleteUser')->name('user.delete');

        // Post
        Route::get('/posts', 'getPost')->name('post.lists');
        Route::get('/posts/{id}', 'detailPost')->name('post.details');
        Route::post('/posts', 'createPost')->name('post.create');
        Route::put('/posts/{id}', 'updatePost')->name('post.update');
        Route::delete('/posts/{id}', 'deletePost')->name('post.delete');
        Route::get('/posts-add', 'addPost')->name('post.add-page');

        // Product
        Route::get('/products', 'getProduct')->name('product.lists');
        Route::get('/products/{id}', 'detailProduct')->name('product.details');
        Route::post('/products', 'createProduct')->name('product.create');
        Route::put('/products/{id}', 'updateProduct')->name('product.update');
        Route::delete('/products/{id}', 'deleteProduct')->name('product.delete');
        Route::get('/products-add', 'addProduct')->name('product.add-page');

        // IMAGE TYPE
        Route::get('/image_types', 'getImageType')->name('image_type.lists');
        Route::get('/image_types/{id}', 'detailImageType')->name('image_type.details');
        Route::post('/image_types', 'createImageType')->name('image_type.create');
        Route::put('/image_types/{id}', 'updateImageType')->name('image_type.update');
        Route::delete('/image_types/{id}', 'deleteImageType')->name('image_type.delete');
        Route::get('/image_types-add', 'addImageType')->name('image_type.add-page');

        // CATEGORY
        Route::get('/categories', 'getCategory')->name('category.lists');
        Route::get('/categories/{id}', 'detailCategory')->name('category.details');
        Route::post('/categories', 'createCategory')->name('category.create');
        Route::put('/categories/{id}', 'updateCategory')->name('category.update');
        Route::delete('/categories/{id}', 'deleteCategory')->name('category.delete');
        Route::get('/categories-add', 'addCategory')->name('category.add-page');
    });
});

// Route::get('/token', function () {
//     return csrf_token();
// });
