<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
    return Inertia::render('Welcome', [
        'hasLogin' => Route::has('login'),
        'hasRegister' => Route::has('register'),
        'checkAuth' => Auth::check(),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
* For Verification User
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
    return Inertia::render('Auth/Verify');
})->middleware(['auth'])->name('verification.notice');

* For Confirms Passwords
Route::get('/confirm-password', function () {
    return view('auth.confirm-password');
})->middleware(['auth'])->name('password.confirm');
Auth::routes();
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
