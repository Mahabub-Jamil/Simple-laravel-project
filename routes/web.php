<?php

use App\Models\Post;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',['posts'=>Post::all()]);
})->name('home');

Route::get('/create',[PostController::class,'create']);
Route::post('/store',[PostController::class,'userfilestore'])->name('store');
Route::get('/edit/{id}',[PostController::class,'editdata'])->name('edit'); 
Route::post('/update{id}',[PostController::class,'updatedata'])->name('update');
Route::get('/delete{id}',[PostController::class,'deletedata'])->name('delete');
