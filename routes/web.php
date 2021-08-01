<?php

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
Route::get('/', 'JobController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Jobs
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('job.show');
Route::get('/jobs/create', 'JobController@create')->name('job.create');
Route::post('/jobs/store', 'JobController@store')->name('job.store');
Route::get('/jobs/my-jobs', 'JobController@myJobs')->name('job.my.jobs');
Route::get('/jobs/edit/{id}/{slug}', 'JobController@edit')->name('job.edit');
Route::post('/jobs/update', 'JobController@update')->name('job.update');
/////////////////////////////// Apply ///////////////////////////
Route::get('/applications/{id}', 'JobController@apply')->name('apply')->middleware('verified');
Route::get('/jobs/applications', 'JobController@applicants')->name('jobs.applicants');
Route::get('/jobs/all', 'JobController@allJobs')->name('all.jobs');

///////////////////////////Save and Unsave Jobs /////////////////
Route::get('/save/{id}', 'FavouriteController@saveJob');
Route::get('/unsave/{id}', 'FavouriteController@unSaveJob');

///////////////////////////// Search Jobs //////////////////////
Route::post('/jobs/search', 'JobController@searchJobs');

// Companies
Route::get('/companies', 'CompanyController@company')->name('company');
Route::get('/company/{id}/{slug}', 'CompanyController@show')->name('company.show');
Route::get('/company/profile', 'CompanyController@companyProfile')->name('company.profile');
Route::post('/company/profile/update', 'CompanyController@companyProfileUpdate')->name('company.profile.update');
Route::post('/company/profile/cover', 'CompanyController@companyProfileCover')->name('company.profile.cover');
Route::post('/company/profile/logo', 'CompanyController@companyProfileLogo')->name('company.profile.logo');


// User Profile
Route::get('user/profile', 'UserProfileController@index')->name('user.profile');
Route::post('user/profile/update', 'UserProfileController@profileSeekerUpdate')->name('profile.seeker.update');
Route::post('user/profile/update/cover', 'UserProfileController@profileSeekerCover')->name('profile.seeker.cover');
Route::post('user/profile/update/resume', 'UserProfileController@profileSeekerResume')->name('profile.seeker.resume');
Route::post('user/profile/update/avatar', 'UserProfileController@profileSeekerAvatar')->name('profile.seeker.avatar');

// Employer
Route::view('employer/registration', 'auth.employer-registration')->name('employer');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('employer.register');

// Category
Route::get('category/{id}/jobs', 'CategoryController@index')->name('category.jobs');

// Email
Route::post('job/mail', 'MailController@sendMail')->name('mail');


// Admin
Route::get('dashboard', 'AdminController@index')->name('dashboard');






















