<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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

Route::get('/posts/{id}', function () {
    return view('admin/editPost');
})->name('postedit');




//get Routes
Route::get('/superadmin', [AdminController::class, 'getAdmin'])->name('superadmin');
Route::get('superadmin/allpost', [PostController::class, 'allpost'])->name('allpost');
Route::get('/', [PostController::class, 'showpost'])->name('home');
Route::get('/admin', [PostController::class, 'showpostall'])->name('admin');
Route::get('/posts/{id}', [PostController::class, 'edit'])->name('edit.posts');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');



//Post Routes
Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
// Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('posts/store', [PostController::class, 'poststore'])->name('posts.store');
Route::post('/approve-post/{id}', [PostController::class, 'approvePost'])->name('approve-post');
Route::post('/cancel-post/{id}', [PostController::class, 'cancelPost'])->name('cancel-post');
Route::post('/adminlogin', [AuthController::class, 'login'])->name('admin.login');


//delete Route
Route::delete('/admin/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
Route::delete('/postdelete/{id}',[PostController::class,'postDelete'])->name('post.delete');

//put Route

Route::put('/postupdate/{id}',[PostController::class,'postEdit'])->name('posts.update');