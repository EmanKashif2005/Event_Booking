<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $events = Event::all();

    return view('events.index', compact('events'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required',
        'venue' => 'required',
        'event_date' => 'required',
        'capacity' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ]);

    Event::create([
    'title' => $request->title,
    'description' => $request->description,
    'venue' => $request->venue,
    'event_date' => $request->event_date,
    'capacity' => $request->capacity,
    'price' => $request->price,
]);
    return redirect('/events')
     ->with('success', 'Event Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
       return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);

    return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'title' => 'required',
        'venue' => 'required',
        'event_date' => 'required',
        'capacity' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ]);

    $event = Event::findOrFail($id);

    $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'venue' => $request->venue,
        'event_date' => $request->event_date,
        'capacity' => $request->capacity,
        'price' => $request->price,
    ]);

    return redirect('/events')->with('success', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

    $event->delete();

    return redirect('/events')
        ->with('success', 'Event Deleted Successfully');
    }
}
