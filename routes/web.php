<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartResourceController;
use App\Http\Controllers\CategoryResourceController;
use App\Http\Controllers\CommentResourceController;
use App\Http\Controllers\OrderResourceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductResourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserResourceController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\map;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ProductController::class, 'home']);

    Route::get('/products/{id}', [ProductController::class, 'detail']);
    
    Route::get('/confirm/{id}', [ProductController::class, 'confirm']);
    
    Route::get('/history', [ProductController::class, 'history']);
    
    Route::get('/profile', [UserController::class, 'profile']);
    Route::put('/profile/update/{id}', [UserController::class, 'update']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::resource('/cart', CartResourceController::class);

    Route::resource('/products', ProductResourceController::class);
    
    Route::delete('/orders/delete/{id}', [OrderResourceController::class, 'delete']);
    Route::resource('/orders', OrderResourceController::class);
});

Route::group(['middleware' => AdminMiddleware::class], function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard', [
            'categories_count' => Category::all()->count(),
            'users_count' => User::all()->count(),
            'comments_count' => Comment::all()->count()
        ]);
    });
    Route::resource('/users', UserResourceController::class);
    Route::resource('/categories', CategoryResourceController::class);
    Route::resource('/comments', CommentResourceController::class);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});
