<?php

use Illuminate\Foundation\Application;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('LandingPage',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landingpage');

Route::get('/trackingticket', function () {
    return Inertia::render('Ticket/TrackingTicket',[
        'canLogin' => Route::has('login'),
    ]);
})->name('trackingticket');

Route::get('/formticket', function () {
    return Inertia::render('Ticket/Index',[
        'canLogin' => Route::has('login'),
    ]);
})->name('formticket');

Route::get('/detailticket', function () {
    return Inertia::render('Ticket/DetailTicket',[
        'canLogin' => Route::has('login'),
    ]);
})->name('detailticket');

Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/Index');
})->name('admin.dashboard');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/faq', function () {
//         return Inertia::render('LandingPage');
//     })->name('faq');
// });
