<?php

use App\Http\Controllers\Apps\DepartmentController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\StatusManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::middleware(['auth', 'verified', 'localeSessionRedirect'])->prefix(LaravelLocalization::setLocale())->group(function () {

    Route::redirect('/', '/dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/dashboard')->group(function () {
        Route::resource('/departments', DepartmentController::class)->middleware('can:read_departments');
        Route::resource('/users', UserManagementController::class)->middleware('can:read_users');
        Route::resource('/roles', RoleManagementController::class)->middleware('can:read_roles');
        Route::resource('/permissions', PermissionManagementController::class)->middleware('can:read_permissions');
        Route::resource('/statuses', StatusManagementController::class)->middleware('can:read_statuses');
        Route::get('/languages/switch/{langLocale}', [LanguageController::class, 'switch'])->name('languages.switch');
        Route::get('/languages/evacuate/{langLocale}', [LanguageController::class, 'evacuate'])->name('languages.evacuate');
        Route::resource('/languages', LanguageController::class);
        Route::get('/search', [DashboardController::class, 'search']);
        Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
//        Route::resource('/notifications', \App\Http\Controllers\NotificationController::class);
#COMMAND_GENERATED_ROUTES#

    });

});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
