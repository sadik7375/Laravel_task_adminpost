<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});


//Get Routes
Route::get('/superadmin', function () {
    return view('superAdmin/addAdmin');
})->name('superadmin');



Route::get('/admin', function () {
    return view('admin/post');
})->name('admin');

Route::get('/adminlogin', function () {
    return view('admin/adminLogin');
})->name('adminlogin');

Route::get('/allpost', function () {
    return view('superAdmin/allpost');
})->name('allpost');





Route::get('/superadmin', [AdminController::class, 'getAdmin'])->name('superadmin');
Route::get('superadmin/allpost', [PostController::class, 'allpost'])->name('allpost');
Route::get('/', [PostController::class, 'showpost'])->name('home');






//Post Routes
Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('posts/store', [PostController::class, 'poststore'])->name('posts.store');



//delete route
Route::delete('/admin/{id}',[AdminController::class,'destroy'])->name('admin.destroy');