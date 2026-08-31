<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Event;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $bookings = Booking::with('event')
        ->where('user_id', $request->user()->id)
        ->get();

    return response()->json([
        'data' => $bookings
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'event_id' => 'required|exists:events,id',
        'seats' => 'required|integer|min:1',
    ]);

    $event = Event::findOrFail($request->event_id);

    $bookedSeats = Booking::where('event_id', $event->id)
        ->where('status', 'confirmed')
        ->sum('seats');

    $availableSeats = $event->capacity - $bookedSeats;

    if ($event->event_date <= now()) {
        return response()->json([
            'message' => 'Cannot book a past event'
        ], 422);
    }

    if ($request->seats > $availableSeats) {
        return response()->json([
            'message' => 'Not enough seats available'
        ], 422);
    }

    $booking = Booking::create([
        'user_id' => $request->user()->id,
        'event_id' => $event->id,
        'seats' => $request->seats,
        'status' => 'confirmed',
    ]);

    return response()->json([
        'message' => 'Booking created successfully',
        'data' => $booking,
    ], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $booking = Booking::findOrFail($id);

    if ($booking->user_id !== auth()->id()) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 403);
    }

    if ($booking->status === 'cancelled') {
        return response()->json([
            'message' => 'Booking is already cancelled'
        ], 422);
    }

    $booking->update([
        'status' => 'cancelled'
    ]);

    return response()->json([
        'message' => 'Booking cancelled successfully',
        'data' => $booking,
    ]);
}
}
