<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', [PostController::class, 'index'])->name('post.index');
/*一覧スタート画面：/を取得したらPostController::classの'index'を実行*/
Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    //投稿画面：*/posts/createをgetメソッド取得したらPostController::classの'create'を実行*/
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    //詳細画面：*/posts/{post}をgetメソッド取得したらPostController::classの'show'を実行*/
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    /*投稿画面  保存用：/postsをpostメソッド取得したらPostController::classの'store'を実行*/
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    /*コメント投稿画面  保存用：/postsをpostメソッド取得したらCommentController::classの'store'を実行*/
    Route::get('/likes/{post}', [LikeController::class, 'like'])->name('like');
    /*いいね機能*/
    Route::get('/unlike/{post}', [LikeController::class, 'unlike'])->name('unlike');
});

require __DIR__.'/auth.php';