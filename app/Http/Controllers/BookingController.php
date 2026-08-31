<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {

        $event = Event::findOrFail($request->event_id);
        if ($event->event_date < now()) {
    return redirect()->back()
        ->with('error', 'This event has already passed.');
}
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'seats' => 'required|integer|min:1',
        ]);
        $bookedSeats = Booking::where('event_id', $event->id)
            ->where('status', 'confirmed')
            ->sum('seats');

        $availableSeats = $event->capacity - $bookedSeats;

        if ($request->seats > $availableSeats) {
            return redirect()->back()
                ->with('error', 'Not enough seats available.');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'seats' => $request->seats,
            'status' => 'confirmed',
        ]);

        return redirect()->back()->with('success', 'Booking Successful!');
    }

    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('event')
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }
    public function adminIndex()
{
    $bookings = Booking::with(['user', 'event'])
        ->latest()
        ->get();

    return view('bookings.admin', compact('bookings'));
}

    public function cancel($id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $booking->update([
            'status' => 'cancelled',
        ]);

        return redirect()->back()
            ->with('success', 'Booking Cancelled Successfully!');
    }
}
