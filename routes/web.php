<?php

use App\Http\Controllers\PaintController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    $posts = Post::inRandomOrder()->limit(20)->get();
    return view(
        'home', ['posts' => $posts]
    );
})->name('home');

Route::get('/dashboard', function () {
    $posts = Post::where('user_id', auth()->id())->get();
    return view('dashboard', ['posts' => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/gallery', [PostController::class, 'index'])->name('gallery');
Route::get('/gallery/create', [PostController::class, 'create'])->name('post.create');
Route::post('/gallery/create', [PostController::class, 'store'])->name('post.save');
Route::get('/gallery/{post}', [PostController::class, 'show']);

Route::get('/users/{user:username}', [ProfileController::class, 'show']);

Route::get('/paints/{paint:name}', [PaintController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
