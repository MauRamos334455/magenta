<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
{
  public function index()
  {
      try {
          $divisions = Division::orderByRaw('unaccent(lower(name))')->get();
          return view("pages.view-divisions")
              ->with("divisions",$divisions);
      } catch (\Illuminate\Database\QueryException $th) {
          return redirect()
              ->route('home')
              ->with('danger', 'Problema con la base de datos.');
      }
  }

  public function search (Request $req)
  {
    try {

      $query = NULL;

      if ( $req->search_type === 'name' OR 
           $req->search_type === 'abbreviation' )

        $query = 'unaccent('.$req->search_type.') ILIKE unaccent(\'%'
               . $req->words . '%\')';

      if ( $query ) {

        $divisions = Division::whereRaw($query)
          ->orderByRaw('unaccent(lower(name))')
          ->get();

      } else {

        $$divisions = collect();

      }

      return view("pages.view-divisions")
          ->with("divisions",$divisions);

    } catch (\Illuminate\Database\QueryException $th) {

      return redirect()
          ->route('home')
          ->with('danger', 'Problema con la base de datos.');

    }
    
  }

  public function store (Request $req)
  {
    try {
        $division = new division();
        $division->division_id = DB::select("select nextval('division_seq')")[0]->nextval;
        $division->name = $req->name;
        $division->abbreviation = $req->abbreviation;
        $division->save();

        return redirect()
          ->route('view.divisions')
          ->with('success', 'División creada correctamente');

    } catch (\Illuminate\Database\QueryException $th) {
        if($th->getCode() == 7)
            return redirect()
              ->route('home')
              ->with('danger', 'No hay conexión con la base de datos.');
        else
            return redirect()
              ->back()
              ->with('warning', 'Error al almacenar, verifique sus datos.')
              ->withInput();
    }
  }

  public function update (Request $req, $division_id) 
  {
    try {

      $division = Division::findOrFail($division_id);
      $division->name = $req->name;
      $division->abbreviation = $req->abbreviation;
      $division->save();

      return redirect()
        ->route('view.divisions')
        ->with('success', 'Cambios realizados.');
          
    } catch (\Illuminate\Database\QueryException $th) {
        
      if($th->getCode() == 7)
        return redirect()
          ->route('home')
          ->with('danger', 'No hay conexión con la base de datos.');
      else
          return redirect()
          ->back()
          ->with('division',$division)
          ->with('warning', 'Error al almacenar, verifique sus datos.');

    }
  }

  public function delete ($division_id) 
  {
      try {
        $division = Division::findOrFail($division_id);
        $division->delete();
        
        return redirect()
          ->route('view.divisions')
          ->with('success', 'Eliminado correctamente.');
  
      } catch (\Illuminate\Database\QueryException $th) {
        
        if($th->getCode() == 7)
          return redirect()
            ->route('home')
            ->with('danger', 'No hay conexión con la base de datos.');
        else
          return redirect()
            ->back()
            ->with('warning', 'Error al eliminar la división.');
      }
  }

}
