<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $events = Event::withCount([
        'bookings as booked_seats' => function ($query) {
            $query->where('status', 'confirmed');
        }
    ])->get();

    $events->each(function ($event) {
        $event->seats_remaining = $event->capacity - $event->booked_seats;

        if ($event->event_date > now()) {
            $event->status = 'upcoming';
        } else {
            $event->status = 'completed';
        }

        unset($event->booked_seats);
    });

    return response()->json([
        'data' => $events
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'venue' => 'required|string|max:255',
        'event_date' => 'required|date',
        'capacity' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ]);

    $event = Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'venue' => $request->venue,
        'event_date' => $request->event_date,
        'capacity' => $request->capacity,
        'price' => $request->price,
    ]);

    return response()->json([
        'message' => 'Event created successfully',
        'data' => $event,
    ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
{
    $event->loadCount([
        'bookings as booked_seats' => function ($query) {
            $query->where('status', 'confirmed');
        }
    ]);

    $event->seats_remaining = $event->capacity - $event->booked_seats;

    if ($event->event_date > now()) {
        $event->status = 'upcoming';
    } else {
        $event->status = 'completed';
    }

    unset($event->booked_seats);

    return response()->json([
        'data' => $event
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'venue' => 'required|string|max:255',
        'event_date' => 'required|date',
        'capacity' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ]);

    $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'venue' => $request->venue,
        'event_date' => $request->event_date,
        'capacity' => $request->capacity,
        'price' => $request->price,
    ]);

    return response()->json([
        'message' => 'Event updated successfully',
        'data' => $event,
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
{
    $event->delete();

    return response()->json([
        'message' => 'Event deleted successfully',
    ]);
}
}
