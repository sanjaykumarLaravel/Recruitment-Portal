<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleSocialiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

 
 
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
// Only For Developer
Route::get('/developer-login-account', function(){
	return view('auth/developer_login');
});
// End
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/recruitment-request-list', [App\Http\Controllers\RecruitmentInformationController::class, 'index'])->name('recruitment-request-list');
Route::get('/create-recruitment-request', [App\Http\Controllers\RecruitmentInformationController::class, 'create'])->name('crate-recruitment-request');
Route::post('/save-recruitment-request', [App\Http\Controllers\RecruitmentInformationController::class, 'save'])->name('save-recruitment-request');
Route::get('/recruitment-view/{id}', [App\Http\Controllers\RecruitmentInformationController::class, 'view'])->name('recruitment-view');
Route::get('/recruitment-comments/{id}', [App\Http\Controllers\RecruitmentInformationController::class, 'comments'])->name('recruitment-comments');
Route::post('/save-recruitment-comment', [App\Http\Controllers\RecruitmentInformationController::class, 'savecomment'])->name('save-recruitment-comment');
// 07/07/2022 Created By Er. Sanjay Kumar
Route::get('/interview-evaluation', [App\Http\Controllers\RecruitmentInformationController::class, 'InterviewEvaluation'])->name('interview-evaluation');
Route::get('/create-interview-evaluation', [App\Http\Controllers\RecruitmentInformationController::class, 'CreateInterviewEvaluation'])->name('create-interview-evaluation');
Route::get('/interviewevaluationview/{id}', [App\Http\Controllers\RecruitmentInformationController::class, 'interviewevaluationview'])->name('interview-evaluation-view');
Route::post('/save-interview-evaluation', [App\Http\Controllers\RecruitmentInformationController::class, 'SaveInterviewEvaluation'])->name('save-interview-evaluation');
Route::get('/interview-evaluation-feedback/{id}/{interviewers}', [App\Http\Controllers\RecruitmentInformationController::class, 'InterviewEvaluationFeedback'])->name('interview-evaluation-feedback');
Route::post('/save-interview-evaluation-feedback', [App\Http\Controllers\RecruitmentInformationController::class, 'SaveInterviewEvaluationFeedback'])->name('save-interview-evaluation-feedback');

// Route::get('/testemail', [App\Http\Controllers\RecruitmentInformationController::class, 'testEmail'])->name('testemail');