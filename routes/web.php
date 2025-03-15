<?php

use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\user\PostJobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProfileController;
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

//admin



Route::group(['prefix' => 'admin'], function () {

        Route::group(['middleware' => 'admin.guest'], function () {


                Route::get('password/update', [AdminLoginController::class, 'showUpdateForm'])->name('password.update.form');
                Route::post('password/update', [AdminLoginController::class, 'updatePassword'])->name('password.update');

                Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
                Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('authenticate');
        });



        Route::group(['middleware' => 'admin.auth'], function () {

                Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');

                Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        });

        Route::post('/login_admin', [AdminLoginController::class, 'login_admin'])->name('login_admin');

        Route::get('profile', [AdminLoginController::class, 'profile'])->name('admin.profile');
        Route::post('adminupdate', [AdminLoginController::class, 'adminupdate'])->name('admin.adminupdate');




        //user-module
        Route::get('/admin/users/{id}/activity', [AdminUserController::class, 'activity'])->name('admin.users.activity');
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/recuiters', [AdminUserController::class, 'RecuiterListindex'])->name('admin.recuiter.index');
        Route::post('/users/{id}/approve', [AdminUserController::class, 'approve'])->name('admin.users.approve');
        Route::get('/users/{id}/activity', [AdminUserController::class, 'showActivityLog'])->name('admin.users.activity');


        //job module
        Route::resource('jobs',  AdminJobController::class);
        Route::get('jobs/{job}/approve', [AdminJobController::class, 'approve'])->name('jobs.approve');
        Route::get('jobs/{job}/reject', [AdminJobController::class, 'reject'])->name('jobs.reject');
        Route::get('jobs/{job}/toggle-premium', [AdminJobController::class, 'togglePremium'])->name('jobs.toggle-premium');
});

//website
Route::get('/', [HomeController::class, 'homepage'])->name('home');
//login
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login-user', [AuthController::class, 'loginuser'])->name('loginUser');
Route::post('/logoutUser', [AuthController::class, 'logoutUser'])->name('logoutUser');
//regiser
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register-user', [AuthController::class, 'store'])->name('register.store');
//fotgotpass
Route::get('/showForgotPasswordForm', [HomeController::class, 'showForgotPasswordForm'])->name('showForgotPasswordForm');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

//post job
Route::get('/post-job', [PostJobController::class, 'postjobForm'])->name('postjobForm');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');

