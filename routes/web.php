<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentDamageReportController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Models\Sport;
use App\Http\Controllers\UserEquipmentReportController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\NewPasswordController;

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');


// Route::post('/send-otp', [AuthController::class, 'sendOtp']);
// Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

Route::get('/verify-otp', [RegisteredUserController::class, 'showOtpPage'])->name('verifyOtp');
Route::post('/verify-otp', [RegisteredUserController::class, 'verifyOtp']);


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin');
    })->name('admin');

    Route::post('/admin/add-email', [AdminController::class, 'storeEmail'])->name('add-email');

    // Emails
    Route::get('/emails', [EmailController::class, 'index'])->name('emails.index');
    Route::get('/emails/create', [EmailController::class, 'create'])->name('emails.create');
    Route::post('/emails/store', [EmailController::class, 'store'])->name('emails.store');
    Route::delete('/emails/{email}', [EmailController::class, 'destroy'])->name('emails.destroy');

    // Sports Management (Admin)
    Route::resource('sports', SportController::class);

    // Equipment Management
    Route::resource('equipment', EquipmentController::class);
});

Route::middleware(['auth', 'verified', 'rolemanager:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user');
    })->name('user');

    // User-specific Sports Page
    Route::get('/user/sports', [SportController::class, 'userSports'])->name('user.sports');

    // Equipment Damage Reports
    Route::get('/reports', [EquipmentDamageReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/create', [EquipmentDamageReportController::class, 'create'])->name('reports.create');
    Route::post('/reports/store', [EquipmentDamageReportController::class, 'store'])->name('reports.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Profile Management
    Route::get('/profiles/create', [UserProfileController::class, 'create'])->name('profiles.create');
    Route::post('/profiles', [UserProfileController::class, 'store'])->name('profiles.store');
    Route::get('/profiles/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profiles', [UserProfileController::class, 'update'])->name('profiles.update');
});



// Route for the home page
Route::get('/index', [PageController::class, 'index'])->name('index');

// Route for About Us page
Route::get('/about-us', [PageController::class, 'about'])->name('users.about-us');

// Route for Sports page
Route::get('/sports-page', [PageController::class, 'sports'])->name('users.sports-page');

// Route for Events page
Route::get('/events', [PageController::class, 'events'])->name('users.events');

// Route for Contact Us page
Route::get('/contact', [PageController::class, 'contact'])->name('users.contact');


//equipment routes
Route::get('/equipments', [EquipmentController::class, 'index'])->name('equipments.index');
Route::get('/equipments/create', [EquipmentController::class, 'index'])->name('equipments.index');
Route::get('/equipments/create', [EquipmentController::class, 'create'])->name('equipments.create');
Route::post('/equipments', [EquipmentController::class, 'store'])->name('equipments.store');
Route::get('/equipments/{equipment}/edit', [EquipmentController::class, 'edit'])->name('equipments.edit');
Route::put('/equipments/{equipment}', [EquipmentController::class, 'update'])->name('equipments.update');
Route::delete('/equipments/{equipment}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');

//sports routes
Route::get('/sports', [SportController::class, 'index'])->name('sports.index');
Route::get('/sports/create', [SportController::class, 'create'])->name('sports.create');
Route::post('/sports', [SportController::class, 'store'])->name('sports.store');
Route::get('/sports/{sport}/edit', [SportController::class, 'edit'])->name('sports.edit');
Route::put('/sports/{sport}', [SportController::class, 'update'])->name('sports.update');
Route::delete('/sports/{sport}', [SportController::class, 'destroy'])->name('sports.destroy');


//booking routes
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::get('/booking/availability', [BookingController::class, 'getAvailableSlots']);
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    // My Bookings Route - using simple consistent naming
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my-bookings');

    // Booking Edit/Update Routes
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');

    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});




// Protect booking routes
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');




Route::get('/sports-page', function () {
    $sports = Sport::all(); // fetch all sports from DB
    return view('users.sports-page', compact('sports'));
})->name('users.sports-page');


//equipment damage report routes

Route::get('/damage-reports', [EquipmentDamageReportController::class, 'index'])->name('damage-reports.index');
Route::get('/damage-reports/create', [EquipmentDamageReportController::class, 'create'])->name('damage-reports.create');
Route::post('/damage-reports', [EquipmentDamageReportController::class, 'store'])->name('damage-reports.store');

Route::put('/damage-reports/update-status/{id}', [EquipmentDamageReportController::class, 'updateStatus'])->name('damage-reports.update-status');


//user equipment damage report routes


// Damage/Loss Report from User Perspective
Route::get('/user-damage-report', [UserEquipmentReportController::class, 'create'])->name('user-damage-report.create');
Route::post('/user-damage-report', [UserEquipmentReportController::class, 'store'])->name('user-damage-report.store');
Route::get('/user-damage-report/view', [UserEquipmentReportController::class, 'index'])->name('user-damage-report.index');



// Admin booking management routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->prefix('admin')->group(function () {
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)
        ->only(['index', 'destroy'])
        ->names([
            'index' => 'admin.bookings.index',
            'destroy' => 'admin.bookings.destroy'
        ]);
});


require __DIR__.'/auth.php';