<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetailTicketController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Models\Faq;

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
    return Inertia::render('LandingPage',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'faqs' => Faq::all(),
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
Route::get('/admin/pengguna/pegawai', function () {
    return Inertia::render('Admin/Pegawai');
})->name('admin.pegawai');
Route::get('/admin/pengguna/petugas', function () {
    return Inertia::render('Admin/Petugas');
})->name('admin.petugas');
Route::get('/admin/ticket', function () {
    return Inertia::render('Admin/Tiket');
})->name('admin.tiket');
Route::get('/admin/faq', function () {
    return Inertia::render('Admin/Faq');
})->name('admin.faq');
Route::get('/admin/dukungan', function () {
    return Inertia::render('Admin/Dukungan');
})->name('admin.dukungan');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/admin/pengguna/profile', [ProfileController::class, 'showOnDashboard'])->name('admin.profile');
});

Route::get("/detail_tickets", [DetailTicketController::class, 'index']);
Route::get("/tickets", [TicketController::class, 'index']);
Route::get("/statuses", [StatusController::class, 'index']);
Route::get("/levels", [LevelController::class, 'index']);
Route::get("/categories", [CategoryController::class, 'index']);
Route::get("/categories", [CategoryController::class, 'index'])->name('categories.index');
Route::get("/faqs", [FaqController::class, 'index'])->name('faqs.index');

Route::get('/last-ticket-id', [TicketController::class, 'getLastTicketId']);

Route::post('/detail_tickets', [DetailTicketController::class, 'create']);
Route::post('/tickets', [TicketController::class, 'create']);
Route::post('/faqs', [FaqController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'create']);


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/faq', function () {
//         return Inertia::render('LandingPage');
//     })->name('faq');
// });
