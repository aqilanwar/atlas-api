<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('front-pages/home');
});
Route::get('/log', function () {
    return view('front-pages/login');
});
Route::get('/register', function () {
    return view('front-pages/register');
});
Route::get('/profile', function () {
    return view('back-pages/profile');
})->name('profile');

Route::get('/courses', function () {
    return view('back-pages/courses');
})->name('courses');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');

});
Route::get('/email_confirmation', [ProfileController::class, 'email_confirmation']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
