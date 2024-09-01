<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AvailablityController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MeetingController;
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

Route::get('/', function () {

    if(isset($_REQUEST['razorpay_payment_id'])){
        return redirect()->route('start.meeting');
    }

    return view('home');
})->name('home');

Route::group(['middleware' => ['auth','jwt.check_expiration']], function() {

    Route::get('/meeting/{meeting_id}', [MeetingController::class, 'meeting'])->name('start.meeting');


    Route::get('/generate-meeting-url', [ZoomController::class, 'generateMeetingUrl']);
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');

    Route::get('/basic-info', [ProfileController::class, 'basicInfo'])->name('basicinfo');

    Route::post('/user/refresh-token', [ProfileController::class, 'refreshToken'])->name('refresh.token');

    Route::prefix('profile')->group(function() {

        Route::get('/dashboard-form/{file_name?}', [ProfileController::class, 'index'])->name('dashboard.form');

        Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.education.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/education', [ProfileController::class, 'profileEducation'])->name('profile.education');
        Route::post('/delete/{id}', [ProfileController::class, 'deleteEducation'])->name('delete.profile.education');
        Route::post('/education/update/{id}', [ProfileController::class, 'educationUpdate'])->name('profile.education.update');

        Route::post('/experience',             [ProfileController::class, 'profileExperience'])->name('profile.experience');
        Route::get('/experience/edit/{id}',    [ProfileController::class, 'experienceEdit'])->name('profile.experience.edit');
        Route::post('/experience/delete/{id}', [ProfileController::class, 'deleteExperience'])->name('delete.profile.experience');
        Route::post('/experience/update/{id}', [ProfileController::class, 'ExperienceUpdate'])->name('profile.experience.update');

        Route::get('/review',    [ProfileController::class, 'review'])->name('profile.review');
        Route::get('/details/{id?}',    [ProfileController::class, 'details'])->name('user.detail');
        Route::get('/user/homepage',    [ProfileController::class, 'myProfile'])->name('user.profile');

        

    });


    Route::prefix('booking')->group(function() {
        
        Route::get('/',    [BookingController::class, 'index'])->name('booking.index');
        Route::get('/stepForms',    [BookingController::class, 'stepForms'])->name('get-step-forms');
        Route::post('/save/{service}',   [BookingController::class, 'saveBooking'])->name('booking.service.save');
        Route::get('/{service}',    [BookingController::class, 'booking'])->name('booking.service');
        Route::post('/{service}',   [BookingController::class, 'bookingStep2'])->name('booking.service-step-2');
       
    });


    Route::prefix('service')->group(function() {
        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/ajax', [ServiceController::class, 'indexAjax'])->name('service.type.ajax');
        Route::get('/add', [ServiceController::class, 'create'])->name('service.add');
        Route::get('/edit/{service_id}', [ServiceController::class, 'edit'])->name('service.edit');

        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::post('/update/{service_id}', [ServiceController::class, 'update'])->name('service.update');
    });



    Route::prefix('availablity')->group(function() {
        Route::get('/', [AvailablityController::class, 'index'])->name('availablity.index');
        Route::get('/add', [AvailablityController::class, 'create'])->name('availablity.add');
        Route::get('/edit/{service_id}', [AvailablityController::class, 'edit'])->name('availablity.edit');
        Route::post('/store/{schedule_id}', [AvailablityController::class, 'store'])->name('availablity.store');
        Route::post('/update/{service_id}', [AvailablityController::class, 'update'])->name('availablity.update');

        Route::post('/save-schedules', [AvailablityController::class, 'saveSchedules'])->name('save.schedules');
        Route::get('/schedules/{schedule_id}', [AvailablityController::class, 'schedulesForm'])->name('schedules.forms');
        Route::get('/form/{id}', [AvailablityController::class, 'formData'])->name('availablity.form.content');


    });

    Route::any('zoom-meeting-create', [ProfileController::class, 'index']);
});


Route::get('search', [SearchController::class, 'search'])->name('search');
Route::post('/search', [SearchController::class, 'searchFilter'])->name('post.search');



Route::post('/sendOtp', [LoginController::class, 'sendOtp'])->name('send.otp');
Route::post('/verifyOtp', [LoginController::class, 'verifyOtp'])->name('verify.otp');

Route::get('/applied', [LoginController::class, 'sendOtp'])->name('applied');

require __DIR__.'/auth.php';

Route::post('/register', [RegisterController::class, 'register'])->name('registers');

Route::get('auth/linkedin', [SocialLoginController::class, 'linkedinRedirect'])->name('linkedin.login');
Route::get('auth/linkedin/callback', [SocialLoginController::class, 'linkedinCallback']);


