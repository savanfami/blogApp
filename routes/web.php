<?php

use Illuminate\Support\Facades\Route;



Route::get('/',[App\Http\Controllers\Customcontroller::class,'index'])->name('home.index');
Route::get('/about',[App\Http\Controllers\Customcontroller::class,'about'])->name('home.about');
Route::get('/blog',[App\Http\Controllers\blogController::class,'index'])->name('blog.index');
Route::get('/single-blog',[App\Http\Controllers\blogController::class,'show'])->name('blog.show');
Route::get('/contact',[App\Http\Controllers\ContactController::class,'index'])->name('contact.index');
