<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return redirect('/events');
// });
Route::resource('events', EventController::class)
    ->middleware('admin')
    ->except(['index', 'show']);

Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/dashboard', function () {
    $totalEvents = Event::count();

    return view('dashboard', compact('totalEvents'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/bookings', [BookingController::class, 'store'])
        ->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'index'])
        ->name('bookings.index');
    Route::patch('/bookings/{id}/cancel', [BookingController::class, 'cancel'])
        ->name('bookings.cancel');
    Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])
    ->middleware('admin')
    ->name('admin.bookings');
});

require __DIR__.'/auth.php';
