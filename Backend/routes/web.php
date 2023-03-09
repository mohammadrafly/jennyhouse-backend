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


Route::controller(BlogController::class)->group(function () 
{
    Route::get('/users', 'getUser');
    Route::get('/users/{id}', 'detailUser');

    // Post
    Route::get('/posts', 'getPost');
    Route::get('/posts/{id}', 'detailPost');

    // Image
    Route::get('/images', 'getImage');
    Route::get('/images/{id}', 'detailImage');
});

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        // User
        Route::get('/users', 'getUser');
        Route::get('/users/{id}', 'detailUser');
        Route::put('/users/{id}', 'updateUser');
        Route::delete('/users/{id}', 'deleteUser');

        // Post
        Route::get('/posts', 'getPost');
        Route::get('/posts/{id}', 'detailPost');
        Route::post('/posts', 'createPost');
        Route::post('/posts/{id}', 'updatePost');
        Route::delete('/posts/{id}', 'deletePost');

        // Image
        Route::get('/images', 'getImage');
        Route::get('/images/{id}', 'detailImage');
        Route::post('/images', 'createImage');
        Route::put('/images/{id}', 'updateImage');
        Route::delete('/images/{id}', 'deleteImage');
    });
});

// Route::get('/token', function () {
//     return csrf_token();
// });
