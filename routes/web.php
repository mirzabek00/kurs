<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth', 'admin'])->controller(AdminController::class)->group(function(){
    Route::get('/home', 'admin_page')->name('admin.home');
    Route::get('/addgrpage', 'add_group_page')->name('add_group_page');
    Route::post('/create_gr', 'create_group')->name('create_group');
    Route::get('/addsbpage', 'add_subject_page')->name('add_subject_page');
    Route::post('/create_sub', 'create_subject')->name('create_subject');
    Route::get('/addstpage', 'add_student_page')->name('add_student_page');
    Route::post('/register_st', 'register_student')->name('register_student');
    Route::get('/addteacherpage', 'add_teacher_page')->name('add_teacher_page');
    Route::post('/register_te', 'register_teacher')->name('register_teacher');
    Route::get('/start_page', 'star_group_page')->name('star_group_page');
    Route::post('/start_gr', 'start_group')->name('start_group');
    Route::get('/current_gr', 'current_groups_page')->name('current_groups_page');
   
});
Route::middleware('auth')->controller(StudentController::class)->group(function(){
    Route::get('/student_home', 'student_home')->name('student_home');
    Route::get('/subject/{sub_id}', 'subject_page')->name('subject_page');
    Route::post('/file_store/{teacher_id}/{group_id}/{subject_id}', 'file_store')->name('file_store');

});
Route::middleware(['auth', 'teacher'])->controller(TeacherController::class)->group(function(){
    Route::get('/teacher_home', 'teacher_home')->name('teacher_home');
    Route::get('/teacher_group/{sub_id}/{group_id}', 'teacher_group')->name('teacher_group');
    Route::post('/score/{work_id}/{sub_id}/{group_id}', 'create_score')->name('create_score');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'login_page')->name('login_page');
    Route::get('/register_page', 'register_page')->name('register_page');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');

});
