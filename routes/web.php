<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\applicantController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuth;
use App\Http\Controllers\noAuthController;
use App\Http\Controllers\PaymentController;

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
     return view('welcome');
 })->name('welcome');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admission-logout', 'App\Http\Controllers\Auth\LoginController@logOut')->name('admission-logout');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/nav-select', [userAuth::class, 'index'])->name('nav-select');

//ADMIN routes
Route::controller(adminController::class)->group(function(){
    Route::get('/admin', 'index')->name('admin_home');
    Route::get('/admin/applicants', 'showApplicants')->name('admin_show_applicant');
    Route::get('/admin/programs-amount', 'programsAmount')->name('admin_program_amount');
    Route::post('/admin/applicants', 'savePaymentAmount')->name('admin_save_program_');
    Route::get('/admin/settings', 'settings')->name('admin_settings_');
    Route::post('/admin/settings', 'updatePassword')->name('admin_post_settings_');

    Route::get('/admin/logout', 'showLogout')->name('admin_logout_');
    Route::get('/admin/programs', 'programs')->name('admin_program_');
    Route::delete('/admin/programs/{id}', 'deleteProgram')->name('admin_delete_program_');
    Route::post('/admin/programs', 'savePrograms')->name('admin_save_program_');
    Route::get('/admin/access-settings', 'accessSettings')->name('admin_access_settings_');
    Route::post('/admin/access-settings', 'createAdminUser')->name('admin_save_access_settings_');
    Route::get('/admin/transactions', 'transaction')->name('admin_transaction_');
    Route::delete('/admin/delete-Admin-user/{id}', 'deleteAdminUser')->name('admin_delete_admin_');
    Route::put('/admin-update/{id}', 'updateAdmin')->name('update_admin');



});

//APPLICANTS routes
Route::controller(applicantController::class)->group(function(){
    Route::get('/applicant', 'index')->name('applicant_home');
    Route::get('/bio-data', 'bioData')->name('applicant_bio_data');
    //  Route::post('/start-application', 'saveApplicant')->name('applicant_save_application_start');
    // Route::get('/start-application', 'applicationStart')->name('applicant_application_Start');
    Route::post('/bio-data', 'saveBioData')->name('save_applicant_bio_data');
    Route::post('/getlga', 'sendApplicantState')->name('send_applicant_lga');
    Route::get('/admission-status', 'showAdmissionStatus')->name('applicant_admission_status');
    Route::get('/admissions/dashboard/application', 'loadApplicationForm')->name('applicant_application');


    //application login
    Route::get('/admissions/login', [applicantController::class, 'applicationLogin'])->name('get_applicant_login');
    Route::get('/admissions/login/{id}', [applicantController::class, 'applicationLogin'])->name('getapplicant_login');
    Route::post('/admissions/login', [applicantController::class, 'processApplicationLogin'])->name('post_applicant_login');

    //DEGREE ROUTES
    Route::get('/admissions/dashboard', 'applicationPage')->name('applicant_dashboard_page');


    //NCE
    Route::get('/admissions/nce/dashboard', 'nceapplicationPage')->name('applicant_nce_application_page');

});



Route::controller(noAuthController::class)->group(function(){
    // Route::get('/start-application', 'applicationStart')->name('applicant_application_Start');
    Route::get('/start-application', 'index')->name('applicant_application_Start');
    Route::post('/start-application', 'saveApplicant')->name('applicant_save_application_start');
    Route::get('/start-application/success', 'showSuccessOnStart')->name('applicant_application_Start_success');


});

Route::controller(PaymentController::class)->group(function(){
Route::get('/admissions/dashboard/payment','loadPayment')->name('payment_page');
});


//Payment Links
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);

