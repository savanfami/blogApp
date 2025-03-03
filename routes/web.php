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
    Route::get('/blog/{slug}', 'show')->name('blog.show');
    Route::get('/create-blog', 'create')->name('blog.create')->middleware('auth');
    Route::post('/blog/store', 'store')->name('blog.store');
    Route::get('/blog/{post}/edit','edit')->name('blog.edit');
    Route::put('/blog/{post}/update','update')->name('blog.update');
    Route::delete('/blog/{post}/delete','destroy')->name('blog.delete');
    
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
