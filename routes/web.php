<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

// Route::get('/post', [HomeController::class, 'post'])->middleware([
//     'auth',
//     'admin'
// ]);


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'homepage']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::get('/', [HomeController::class,'homepage']);
//for admin home
Route::get('/admin/home', [AdminController::class, 'index'])->middleware('auth','admin')->name('admin.home');

Route::get('/post_page', [AdminController::class,'post_page'])->middleware('auth');

Route::post('/add_post', [AdminController::class,'add_post'])->middleware('auth');

Route::get('/show_post', [AdminController::class,'show_post'])->middleware('auth');

Route::get('/delete_post/{id}', [AdminController::class,'delete_post'])->middleware('auth');

Route::get('/edit_post/{id}', [AdminController::class,'edit_post'])->middleware('auth');


Route::post('/update_post/{id}', [AdminController::class,'update_post'])->middleware('auth');

Route::get('/post_details/{id}', [HomeController::class,'post_details'])->middleware('auth');

Route::get('/create_post', [HomeController::class,'create_post'])->middleware('auth');

Route::post('/user_post', [HomeController::class,'user_post'])->middleware('auth');

Route::get('/my_post', [HomeController::class,'my_post'])->middleware('auth');

Route::get('/my_post_del/{id}', [HomeController::class,'my_post_del'])->middleware('auth');

Route::get('/post_update_page/{id}', [HomeController::class,'post_update_page'])->middleware('auth');

Route::post('/update_post_page/{id}', [HomeController::class,'update_post_page'])->middleware('auth');

//for about page
Route::get('/about_page', [HomeController::class,'about_page'])->middleware('auth');