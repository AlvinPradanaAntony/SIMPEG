<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use App\Models\Faq;

Route::get('/', function () {
    return Inertia::render('LandingPage',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'faqs' => Faq::all(),
    ]);
})->name('landingpage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/admin/pengguna/profile', [ProfileController::class, 'showOnDashboard'])->name('admin.profile');
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

Route::get('/formticket', [TicketController::class, 'formTicket'])->name('formticket');

Route::get('/detailticket', function () {
    return Inertia::render('Ticket/DetailTicket',[
        'canLogin' => Route::has('login'),
    ]);
})->name('detailticket');

Route::get('/admin/dashboard', [TicketController::class, 'indexDashboard'])->name('admin.dashboard');

Route::get('/admin/pengguna/pegawai', [UserController::class, 'indexEmployee'])->name('admin.pegawai');
Route::get('/admin/pengguna/pegawai/create', [UserController::class, 'createEmployee'])->name('admin.pegawai.create');
Route::post('/admin/pengguna/pegawai', [UserController::class, 'storeEmployee'])->name('admin.pegawai.store');
Route::get('/admin/pengguna/pegawai/edit/{id}', [UserController::class, 'editEmployee'])->name('admin.pegawai.edit');
Route::put('/admin/pengguna/pegawai/{id}', [UserController::class, 'updateEmployee'])->name('admin.pegawai.update');
Route::delete('/admin/pengguna/pegawai/{id}', [UserController::class, 'destroyEmployee'])->name('admin.pegawai.destroy');

Route::get('/admin/pengguna/petugas', [UserController::class, 'indexAdmin'])->name('admin.petugas');
Route::get('/admin/pengguna/petugas/create', [UserController::class, 'createAdmin'])->name('admin.petugas.create');
Route::post('/admin/pengguna/petugas', [UserController::class, 'storeAdmin'])->name('admin.petugas.store');
Route::get('/admin/pengguna/petugas/edit/{id}', [UserController::class, 'editAdmin'])->name('admin.petugas.edit');
Route::put('/admin/pengguna/petugas/{id}', [UserController::class, 'updateAdmin'])->name('admin.petugas.update');
Route::delete('/admin/pengguna/petugas/{id}', [UserController::class, 'destroyAdmin'])->name('admin.petugas.destroy');

Route::get('/admin/ticket', [TicketController::class, 'index'])->name('admin.tiket');
// Route::post('/admin/ticket', [TicketController::class, 'store'])->name('admin.tiket.store');
// Route::get('/admin/ticket', [TicketController::class, 'edit'])->name('admin.tiket.edit');
// Route::put('/admin/ticket/{id}', [TicketController::class, 'update'])->name('admin.tiket.update');
// Route::delete('/admin/ticket/{id}', [TicketController::class, 'destroy'])->name('admin.tiket.destroy');

Route::get('/admin/faq', [FaqController::class, 'index'])->name('admin.faq');
Route::get('/admin/faq/create', [FaqController::class, 'create'])->name('admin.faq.create');
Route::post('/admin/faq', [FaqController::class, 'store'])->name('admin.faq.store');
Route::get('/admin/faq/edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
Route::put('/admin/faq/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
Route::delete('/admin/faq/{id}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');

Route::get('/admin/data/bidang', [DepartmentController::class, 'index'])->name('admin.department');
Route::post('/admin/data/bidang', [DepartmentController::class, 'store'])->name('admin.department.store');
Route::get('/admin/data/bidang/{id}', [DepartmentController::class, 'edit'])->name('admin.department.edit');
Route::put('/admin/data/bidang/{id}', [DepartmentController::class, 'update'])->name('admin.department.update');
Route::delete('/admin/data/bidang/{id}', [DepartmentController::class, 'destroy'])->name('admin.department.destroy');

Route::get('/admin/data/jabatan', [PositionController::class, 'index'])->name('admin.position');
Route::post('/admin/data/jabatan', [PositionController::class, 'store'])->name('admin.position.store');
Route::get('/admin/data/jabatan/{id}', [PositionController::class, 'edit'])->name('admin.position.edit');
Route::put('/admin/data/jabatan/{id}', [PositionController::class, 'update'])->name('admin.position.update');
Route::delete('/admin/data/jabatan/{id}', [PositionController::class, 'destroy'])->name('admin.position.destroy');

Route::get('/admin/data/kategori', [CategoryController::class, 'index'])->name('admin.category');
Route::post('/admin/data/kategori', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/data/kategori/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/data/kategori/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('/admin/data/kategori/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

Route::get('/admin/data/status', [StatusController::class, 'index'])->name('admin.status');
Route::post('/admin/data/status', [StatusController::class, 'store'])->name('admin.status.store');
Route::get('/admin/data/status/{id}', [StatusController::class, 'edit'])->name('admin.status.edit');
Route::put('/admin/data/status/{id}', [StatusController::class, 'update'])->name('admin.status.update');
Route::delete('/admin/data/status/{id}', [StatusController::class, 'destroy'])->name('admin.status.destroy');

Route::get('/admin/data/ulasan', [ReviewController::class, 'index'])->name('admin.review');
Route::post('/admin/data/ulasan', [ReviewController::class, 'store'])->name('admin.review.store');
Route::get('/admin/data/ulasan/{id}', [ReviewController::class, 'edit'])->name('admin.review.edit');
Route::put('/admin/data/ulasan/{id}', [ReviewController::class, 'update'])->name('admin.review.update');
Route::delete('/admin/data/ulasan/{id}', [ReviewController::class, 'destroy'])->name('admin.review.destroy');

Route::get('/admin/data/akses', [RoleController::class, 'index'])->name('admin.role');
Route::post('/admin/data/akses', [RoleController::class, 'store'])->name('admin.role.store');
Route::get('/admin/data/akses/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
Route::put('/admin/data/akses/{id}', [RoleController::class, 'update'])->name('admin.role.update');
Route::delete('/admin/data/akses/{id}', [RoleController::class, 'destroy'])->name('admin.role.destroy');

Route::get('/admin/dukungan', function () {
    return Inertia::render('Admin/Dukungan');
})->name('admin.dukungan');
});

// Route::get("/detail_tickets", [DetailTicketController::class, 'index']);
// Route::get("/tickets", [TicketController::class, 'index']);
// Route::get("/statuses", [StatusController::class, 'index']);
// Route::get("/roles", [RoleController::class, 'index']);
// Route::get("/categories", [CategoryController::class, 'index']);
// Route::get("/categories", [CategoryController::class, 'index'])->name('categories.index');
// Route::get("/faqs", [FaqController::class, 'index'])->name('faqs.index');
// Route::get("/users", [UserController::class, 'index']);
// Route::get("/departments", [DepartmentController::class, 'index']);
// Route::get("/positions", [PositionController::class, 'index']);
// Route::get("/reviews", [ReviewController::class, 'index']);

// Route::get('/last-ticket-id', [TicketController::class, 'getLastTicketId']);

// Route::post('/detail_tickets', [DetailTicketController::class, 'create']);
// Route::post('/tickets', [TicketController::class, 'create']);
// Route::post('/faqs', [FaqController::class, 'create']);
// Route::post('/categories', [CategoryController::class, 'create']);
// Route::post('/positions', [PositionController::class, 'create']);