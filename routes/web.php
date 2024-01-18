<?php

use App\Http\Controllers\Auth\MagicLinkController;
use App\Http\Controllers\Auth\MagicLoginController;
use App\Http\Controllers\Auth\MagicRegisterController;
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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('home');

/* NÂO meti isto porque usei um middleware para fazer a validação do recaptcha ver se faz sentido usar em todo o lado isto
Route::post(\Laravel\Fortify\RoutePath::for('password.email', '/forgot-password'), [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.email');*/

Route::get('dark-mode-switcher', [\App\Http\Controllers\DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [\App\Http\Controllers\ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

// Override the Fortify authentication routes
Route::post('/login', [MagicLoginController::class, 'store'])->name('magic-login')->middleware('guest');
Route::post('/register', [MagicRegisterController::class, 'store'])->name('magic-register')->middleware('guest');

// Performs auth with magic link
Route::get('auth/{user}', [MagicLoginController::class, 'auth'])->name('auth.magic')->middleware('signed');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');


    Route::patch('/user/profile', [App\Http\Controllers\UserController::class, 'updateMe'])->name('users.update_me');
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::impersonate();

    Route::resource('settings', App\Http\Controllers\SettingController::class); //TODO este controller e crud não está ainda feito
    Route::get('translations/{groupKey?}', '\Barryvdh\TranslationManager\Controller@getIndex')->where('groupKey', '.*')->name('translations.index');

    Route::resource('demos', App\Http\Controllers\DemoController::class);

    Route::resource('entities', App\Http\Controllers\EntityController::class);
    Route::resource('zones', App\Http\Controllers\ZoneController::class);
    Route::resource('venues', App\Http\Controllers\VenueController::class);
});
