<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEventRequest;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        $totalEvents = DB::table('events')
                            //  ->where('deleted_at', null)   DA RIMETTERE DOPO CON LA SOFT DELETE
                             ->count();
        return view("admin.events.index", compact('events', 'totalEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view("admin.events.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        // Usa i dati validati dalla request personalizzata
        $validatedData = $request->validated();

        // Crea un nuovo evento con i dati validati
        Event::create($validatedData);

        // Redirect alla pagina degli eventi con un messaggio di successo
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
