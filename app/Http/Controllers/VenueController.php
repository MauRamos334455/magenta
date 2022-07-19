<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use Illuminate\Support\Facades\DB;

class VenueController extends Controller
{
    public function index()
    {
        try {
            $venues = Venue::all();
            return view("pages.view-venues")
                ->with("venues",$venues);
        } catch (\Illuminate\Database\QueryException $th) {
            return redirect()
                ->route('home')
                ->with('danger', 'Problema con la base de datos.');
        }
    }

    public function create(){
        return view ("pages.create-venue");
    }

    public function store(Request $req){
        try {
            $venue = new Venue();
            $venue->venue_id = DB::select("select nextval('venue_seq')")[0]->nextval;
            $venue->name = $req->name;
            $venue->capacity = $req->capacity;
            $venue->location = $req->location;
            $venue->save();

            return redirect()
              ->route('view.venues')
              ->with('success', 'Salón creado correctamente');

        } catch (\Illuminate\Database\QueryException $th) {
            if($th->getCode() == 7)
                return redirect()
                  ->route('home')
                  ->with('danger', 'Problema con la base de datos.');
            else
                return redirect()
                  ->back()
                  ->with('warning', 'Error al almacenar, verifique sus datos.')
                  ->withInput();
        }
    }

    public function edit($venue_id){
        try {
            $venue = Venue::findOrFail($venue_id);
            return view("pages.update-venue")
              ->with("venue",$venue);
        } catch (\Illuminate\Database\QueryException $th) {
            return redirect()
              ->route('view.venues')
              ->with('danger','Problema con la base de datos.');
        }
    }

    public function update(Request $req, $venue_id){
        try {
            $venue = Venue::findOrFail($venue_id);
            $venue->name = $req->name;
            $venue->capacity = $req->capacity;
            $venue->location = $req->location;
            $venue->save();

            return redirect()
              ->route('edit.venue',$venue->venue_id)
              ->with('success', 'Cambios realizados.');
        } catch (\Illuminate\Database\QueryException $th) {
            if($th->getCode() == 7)
                return redirect()
                  ->route('home')
                  ->with('danger', 'Problema con la base de datos.');
            else
                return redirect()
                  ->back()
                  ->with('venue',$venue)
                  ->with('warning', 'Error al almacenar, verifique sus datos.');
        }
    }

    public function delete($venue_id){
        try {
          $venue = Venue::findOrFail($venue_id);
          $venue->delete();
          
          return redirect()
            ->route('view.venues')
            ->with('success', 'Eliminado correctamente.');
    
        } catch (\Illuminate\Database\QueryException $th) {
          
          if($th->getCode() == 7)
            return redirect()
              ->route('home')
              ->with('danger', 'Problema con la base de datos.');
          else
            return redirect()
              ->back()
              ->with('warning', 'Error al eliminar el salón.');
        }
      }
   
}
