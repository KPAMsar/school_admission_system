<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\applicantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuth;

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
 });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/nav-select', [userAuth::class, 'index'])->name('nav-select');

//ADMIN routes
Route::controller(adminController::class)->group(function(){
    Route::get('/admin', 'index')->name('admin_home');
    Route::get('/admin/applicants', 'showApplicants')->name('admin_show_applicant');
    Route::get('/admin/programs-amount', 'programsAmount')->name('admin_program_amount');
    Route::get('/admin/logout', 'showLogout')->name('admin_logout_');
    Route::get('/admin/programs', 'programs')->name('admin_program_');
    Route::get('/admin/transactions', 'transactions')->name('admin_transactions_');


});

//APPLICANTS routes
Route::controller(applicantController::class)->group(function(){
    Route::get('/applicant', 'index')->name('applicant_home');
    Route::get('/bio-data', 'bioData')->name('applicant_bio_data');
    Route::post('/start-application', 'saveApplicant')->name('applicant_save_application_start');
    Route::get('/start-application', 'applicationStart')->name('applicant_application_Start');
    Route::post('/bio-data', 'saveBioData')->name('save_applicant_bio_data');


    //DEGREE ROUTES
    Route::get('/degree-application', 'applicationPage')->name('applicant_application_page');

    //NCE
    Route::get('/nce-application', 'nceapplicationPage')->name('applicant_nce_application_page');

});
