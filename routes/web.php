<?php

use App\Http\Controllers\ProfileController;
use Dom\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;

// admin controller
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoriesController;



Route::get('/test', function(){
    return view('users.emails.welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/people', [HomeController::class, 'search'])->name('search');
    Route::get('/allSuggest', [HomeController::class, 'allSuggest'])->name('suggest');

    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

    Route::post('/comment/{post_id}/store', [commentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}/destroy', [commentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
    Route::get('/profile/{id}/following', [ProfileController::class, 'following'])->name('profile.following');

    // like
    Route::post('/like/{post_id}/store', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/{post_id}/destroy', [LikeController::class, 'destroy'])->name('like.destroy');

    // follow
    Route::post('/follow/{user_id}/store', [FollowController::class, 'store'])->name('follow.store');
    Route::delete('/follow/{user_id}/destroy', [FollowController::class, 'destroy'])->name('follow.destroy');
    
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        // user
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::delete('/users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
        Route::patch('/users/{id}/activate', [UsersController::class, 'activate'])->name('users.activate');
        

        // post
        Route::get('/post', [PostsController::class, 'index'])->name('post');
        Route::delete('/post/{id}/hide', [PostsController::class, 'hide'])->name('post.hide');
        Route::patch('/post/{id}/visible', [PostsController::class, 'visible'])->name('post.visible');

        // category
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
        Route::post('/categories/add', [CategoriesController::class, 'add'])->name('categories.add');
        Route::patch('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::delete('/categories/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    });
}
);







