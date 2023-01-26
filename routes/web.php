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
Route::get('/attendance/{subject_id}', [ProfileController::class, 'ShowAttendance'])->name('courses-attendance');
Route::get('/test/{subject_id}', [ProfileController::class, 'ShowTest'])->name('courses-test');
Route::get('/update-attendance/{attendance_id}', [ProfileController::class, 'SignAttendance'])->name('courses-sign-attendance');
Route::get('/timetable', [ProfileController::class, 'ShowTimetable'])->name('timetable');
Route::get('/payment', [ProfileController::class, 'ShowPayment'])->name('payment');
Route::post('/update-user', [ProfileController::class, 'UpdateProfile'])->name('update-profile');
Route::get('/create-receipt', [BillController::class, 'CreateReceipt'])->name('create-receipt');


Route::get('/make-payment/{invoice_id}', [BillController::class, 'MakePayment'])->name('make-payment');
Route::post('/make-payment/{invoice_id}', [BillController::class, 'AttemptPayment'])->name('make-payment-post');


Route::get('/register-courses', [SubjectController::class, 'FirstTimeRegister'])->name('register-courses');


// Route::get('/register-courses', function () {
//     return view('back-pages/register-courses');
// })->name('register-courses');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/email_confirmation', [ProfileController::class, 'email_confirmation']);
Route::middleware('auth')->group(function () {
    Route::post('/update-detail/save', [ProfileController::class, 'SaveUpdateDetail'])->name('update-detail.save');
    Route::get('/profile', [ProfileController::class, 'ShowProfile'])->name('profile');
    Route::post('/redirect-payment-page', [SubjectController::class, 'RedirectPaymentPage'])->name('redirect-payment-page');
    Route::post('/submit-payment', [BillController::class, 'SubmitPayment'])->name('submit-payment');
});




//TEACHER ROUTE
Route::get('/login/staff', [StaffLoginController::class ,'showLoginForm'])->name('staff.login');
Route::post('/login/staff', [StaffLoginController::class ,'login'])->name('staff.login.post');
Route::get('/logout/staff', [StaffLoginController::class ,'logout'])->name('staff.logout');
//Admin Home page after login
Route::group(['middleware'=>'staff'], function() {
    Route::get('/staff/profile', [StaffController::class , 'index'])->name('staff.profile');
    Route::get('/staff/courses', [StaffController::class , 'ShowCourses'])->name('staff.courses');
    
    //Attendance
    Route::get('/staff/attendance/show/{id}', [StaffController::class , 'ShowAttendancePage'])->name('staff.attendance');
    Route::get('/staff/attendance/view/{subject_id}/{attendance_id}', [StaffController::class , 'ViewAttendance'])->name('staff.view.attendance');
    Route::post('/staff/attendance/create', [StaffController::class , 'CreateAttendance'])->name('create-attendance');

    //Test
    Route::get('/staff/test/show/{id}', [StaffController::class , 'ShowTestPage'])->name('staff.test');
    Route::get('/staff/test/view/{subject_id}/{test_id}', [StaffController::class , 'ViewTest'])->name('staff.view.test');   
    Route::post('/staff/test/create', [StaffController::class , 'CreateTest'])->name('create-test');
    Route::post('/staff/test/update', [StaffController::class , 'UpdateTest'])->name('update-test');

    //admin courses
    Route::get('/admin/courses', [StaffController::class , 'AdminCourse'])->name('admin.courses');
    Route::post('/admin/courses/create', [StaffController::class , 'AdminCreateCourse'])->name('admin.create.courses');
    Route::get('/admin/courses/show/{subject_id}', [StaffController::class , 'AdminViewCourse'])->name('admin.view.courses');
    Route::post('/admin/courses/update', [StaffController::class , 'AdminUpdateCourse'])->name('admin.update.courses');
    Route::post('/admin/courses/delete', [StaffController::class , 'AdminDeleteCourse'])->name('admin.delete.courses');

    //admin teacher

    Route::get('/admin/teacher', [StaffController::class , 'AdminTeacher'])->name('admin.teacher');
    Route::post('/admin/teacher/create', [StaffController::class , 'AdminCreateTeacher'])->name('admin.create.teacher');
    Route::post('/admin/teacher/delete', [StaffController::class , 'AdminDeleteTeacher'])->name('admin.delete.teacher');

    Route::get('/admin/payment/', [StaffController::class , 'AdminPayment'])->name('admin.payment');
    Route::post('/admin/payment/delete', [StaffController::class , 'AdminDeleteInvoice'])->name('admin.delete.invoice');
    Route::get('/admin/payment/bill/all', [StaffController::class , 'AdminPaymentAll'])->name('admin.payment.all');
    Route::get('/admin/payment/bill/show/{bill_title}', [StaffController::class , 'AdminPaymentTitle'])->name('admin.payment.title');

    Route::post('/create-invoice', [BillController::class, 'CreateInvoice'])->name('create-invoice');
    // Route::post('/admin/payment/create', [StaffController::class , 'AdminCreatePayment'])->name('admin.create.teacher');
    // Route::post('/admin/payment/delete', [StaffController::class , 'AdminDeletePayment'])->name('admin.delete.teacher');
    // Route::post('/admin/courses/create', [StaffController::class , 'AdminCreateTeacher'])->name('admin.create.teacher');
    // // Route::post('/admin/courses/update', [StaffController::class , 'AdminUpdateTeacher'])->name('admin.update.teacher');
    // Route::post('/admin/courses/delete', [StaffController::class , 'AdminDeleteTeacher'])->name('admin.delete.teacher');
    // Route::get('/admin/courses/show/{subject_id}', [StaffController::class , 'AdminViewTeacher'])->name('admin.view.teacher');



});


require __DIR__.'/auth.php';