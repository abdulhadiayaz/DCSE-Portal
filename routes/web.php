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

// advisors
Route::get('/advisors', 'AdvisorController@advisor')->name('advisor');
Route::get('/advisor/{id}/{slug}', 'AdvisorController@show')->name('advisor.show');
Route::get('/advisor/profile', 'AdvisorController@advisorProfile')->name('advisor.profile');
Route::post('/advisor/profile/update', 'AdvisorController@advisorProfileUpdate')->name('advisor.profile.update');
Route::post('/advisor/profile/cover', 'AdvisorController@advisorProfileCover')->name('advisor.profile.cover');
Route::post('/advisor/profile/logo', 'AdvisorController@advisorProfileLogo')->name('advisor.profile.logo');


// User Profile
Route::get('user/profile', 'UserProfileController@index')->name('user.profile');
Route::post('user/profile/update', 'UserProfileController@profileSeekerUpdate')->name('profile.seeker.update');
Route::post('user/profile/update/cover', 'UserProfileController@profileSeekerCover')->name('profile.seeker.cover');
Route::post('user/profile/update/resume', 'UserProfileController@profileSeekerResume')->name('profile.seeker.resume');
Route::post('user/profile/update/avatar', 'UserProfileController@profileSeekerAvatar')->name('profile.seeker.avatar');

// helper
Route::view('helper/registration', 'auth.helper-registration')->name('helper');
Route::post('helper/register', 'HelperRegisterController@helperRegister')->name('helper.register');

// Category
Route::get('category/{id}/jobs', 'CategoryController@index')->name('category.jobs');

// Email
Route::post('job/mail', 'MailController@sendMail')->name('mail');


// Admin
Route::get('dashboard', 'AdminController@index')->name('dashboard');






















