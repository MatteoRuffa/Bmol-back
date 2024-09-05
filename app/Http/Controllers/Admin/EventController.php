<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        $totalEvents = DB::table('events')
                            ->where('deleted_at', null)   
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
        $form_data = $request->validated();
    
        // Genera lo slug usando il metodo statico nel modello Event
        $form_data['slug'] = Event::generateSlug($form_data['name']);
    
        // Controlla se è stato caricato un file per l'immagine di copertina
        if ($request->hasFile('image_cover')) {
            // Salva l'immagine nella cartella 'events' e ottieni il percorso
            $img_path = Storage::put('events', $request->file('image_cover'));
            $form_data['image_cover'] = $img_path;
        }

          // Gestione della visibilità: se non è selezionata, imposta 'visibility' a 0
        $form_data['visibility'] = $request->has('visibility') ? 1 : 0;
    
        // Crea un nuovo evento con i dati validati
        $new_event = new Event();
        $new_event->fill($form_data);
        $new_event->save();
    
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
