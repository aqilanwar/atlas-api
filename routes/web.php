<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\StaffLoginController;

// use App\Http\Controllers\StaffController;
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
// Route::get('/profile', function () {
//     return view('back-pages/profile');
// })->name('profile');


Route::get('/update-detail', [ProfileController::class, 'ShowUpdateDetail'])->name('update-detail');
Route::get('/courses', [ProfileController::class, 'ShowCourses'])->name('courses');
Route::get('/attendance/{id}', [ProfileController::class, 'ShowAttendance'])->name('courses-attendance');
Route::get('/timetable', [ProfileController::class, 'ShowTimetable'])->name('timetable');
Route::get('/payment', [ProfileController::class, 'ShowPayment'])->name('payment');

Route::get('/register-courses', [SubjectController::class, 'FirstTimeRegister'])->name('register-courses');


// Route::get('/register-courses', function () {
//     return view('back-pages/register-courses');
// })->name('register-courses');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::post('/update-detail/save', [ProfileController::class, 'SaveUpdateDetail'])->name('update-detail.save');
    Route::get('/email_confirmation', [ProfileController::class, 'email_confirmation']);
    Route::get('/profile', [ProfileController::class, 'ShowProfile'])->name('profile');
    Route::post('/redirect-payment-page', [SubjectController::class, 'RedirectPaymentPage'])->name('redirect-payment-page');
    Route::post('/submit-payment', [BillController::class, 'SubmitPayment'])->name('submit-payment');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


//TEACHER ROUTE
Route::get('/login/staff', [StaffLoginController::class ,'showLoginForm'])->name('staff.login');
Route::post('/login/staff', [StaffLoginController::class ,'login'])->name('staff.login.post');
Route::get('/logout/staff', [StaffLoginController::class ,'logout'])->name('staff.logout');
//Admin Home page after login
Route::group(['middleware'=>'staff'], function() {
    Route::get('/staff/profile', [StaffController::class , 'index'])->name('staff.profile');
    Route::get('/staff/courses', [StaffController::class , 'ShowCourses'])->name('staff.courses');
});


require __DIR__.'/auth.php';
