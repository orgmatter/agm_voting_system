<?php

use Illuminate\Support\Facades\Route;

// --> Admin controllers
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;

// --> Shareholder controllers
use App\Http\Controllers\Shareholder\AuthController as ShareholderAuthController;
use App\Http\Controllers\Shareholder\DashboardController as ShareholderDashboardController;
use App\Http\Controllers\Shareholder\LoginController as ShareholderLoginController;

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

// --> Routes for Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    
    Route::get('/', [AdminAuthController::class, 'admin']);
    Route::get('login/show', [AdminLoginController::class, 'showLogin'])->name('showLogin');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login');
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('dashboard/shareholder', [AdminDashboardController::class, 'create_shareholder'])->name('createShareholder');
    Route::delete('dashboard/shareholder/{id}', [AdminDashboardController::class, 'delete_shareholder'])->name('deleteShareholder');
    Route::post('dashboard/vote', [AdminDashboardController::class, 'create_vote'])->name('createVote');
    Route::get('dashboard/edit_vote', [AdminDashboardController::class, 'show_edit_vote'])->name('showEditVote');
    Route::put('dashboard/vote/edit/{id}', [AdminDashboardController::class, 'update_vote'])->name('editVote');
    Route::delete('dashboard/vote/{id}', [AdminDashboardController::class, 'delete_vote'])->name('deleteVote');
    Route::put('dashboard/reset_password', [AdminDashboardController::class, 'reset_password'])->name('resetPassword');
    Route::get('dashboard/logout', [AdminDashboardController::class, 'logout'])->name('logout');
});


// --> Routes for Shareholders
Route::group(['prefix' => 'shareholder', 'as' => 'shareholder.'], function() {
    
    Route::get('/', [ShareholderAuthController::class, 'shareholder']);
    Route::get('login/show', [ShareholderLoginController::class, 'showLogin'])->name('showLogin');
    Route::post('login', [ShareholderLoginController::class, 'login'])->name('login');
    Route::get('dashboard', [ShareholderDashboardController::class, 'dashboard'])->name('dashboard');
    Route::put('dashboard/reset_password', [ShareholderDashboardController::class, 'reset_password'])->name('resetPassword');
    Route::get('dashboard/on_vote/{id}', [ShareholderDashboardController::class, 'on_vote'])->name('onVote');
    Route::get('dashboard/logout', [ShareholderDashboardController::class, 'logout'])->name('logout');
});


