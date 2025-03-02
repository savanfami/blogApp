<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


use App\Http\Controllers\Customcontroller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;


Route::controller(Customcontroller::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/about', 'about')->name('home.about');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog.index');
    Route::get('/blog/{post:slug}', 'show')->name('blog.show');
    Route::get('/create-blog', 'create')->name('blog.create');
    Route::post('/blog/store', 'store')->name('blog.store');

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
