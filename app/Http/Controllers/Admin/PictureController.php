<?php

namespace App\Http\Controllers\Admin;

use App\Models\Picture;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePictureRequest;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pictures = Picture::all();
        $totalPictures = DB::table('pictures')
                            // ->where('deleted_at', null)   
                             ->count();
        return view("admin.pictures.index", compact('pictures', 'totalPictures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();  
        return view("admin.pictures.create", compact('events'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePictureRequest $request)
    {
       // Usa i dati validati dalla request personalizzata
        $form_data = $request->validated();

       // Controlla se è stato caricato un file per l'immagine di copertina
        if ($request->hasFile('image')) 
            {
            // Salva l'immagine nella cartella 'events' e ottieni il percorso
            $img_path = $request->file('image')->store('images', 'public');
            $form_data['image'] = $img_path;
            };


        $form_data['event_id'] = $request->input('event_id');

        // Crea un nuovo evento con i dati validati
        $new_event = new Picture();
        $new_event->fill($form_data);
        $new_event->save();

        // Redirect alla pagina degli eventi con un messaggio di successo
        return redirect()->route('admin.pictures.index')->with('success', 'picture added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
