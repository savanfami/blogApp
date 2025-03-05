<?php

use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;

Auth::routes();


use App\Http\Controllers\Customcontroller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;


Route::controller(Customcontroller::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
}); 

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog.index');
    Route::get('/blog/{slug}', 'show')->name('blog.show');
    Route::get('/create-blog', 'create')->name('blog.create')->middleware('auth');
    Route::post('/blog/store', 'store')->name('blog.store');
    Route::get('/blog/{post}/edit','edit')->name('blog.edit');
    Route::put('/blog/{post}/update','update')->name('blog.update');
    Route::delete('/blog/{post}/delete','destroy')->name('blog.delete');
    Route::get('/myblog','myblog')->name('blog.myblog');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(categoryController::class)->group(function () {callback: 
    Route::get('/category/create', 'create')->name('categories.create');
    Route::get('/category', 'index')->name('categories.index');
    Route::post('/category/store', 'store')->name('category.store');
    Route::get('/category/{cat}/edit','edit')->name('category.edit');
    Route::put('/category/{cat}/update','update')->name('category.update');
    Route::delete('/category/{cat}/delete','destroy')->name('category.delete');

});
