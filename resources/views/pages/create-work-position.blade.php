@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header"><br>
    <h3>Crear Categoría y Nivel <i class="bi bi-mortarboard"></i></h3>
  </div>
  @include('partials.messages')
  <div class="card-body"><br>
    <form  method="POST" action="{!! route('store.work-position') !!}">
      @csrf
      @method('post')
      <div class="row">
        <div class="col-xl-6">
          <label class="form-label" for="name">Nombre:</label>
          <input required class="form-control" type="text" name="name" id="name" placeholder="Ej. Profesor Auxiliar B" value="{!! old('name') !!}">
        </div>
        <div class="col-xl-3">
          <label class="form-label" for="abbreviation">Abreviación:</label>
          <input required class="form-control" type="text" name="abbreviation" id="abbreviation" placeholder="Ej. AUX B" value="{!! old('key') !!}">
        </div>
        <div class="col-xl-2 mt-auto">
          <input type="submit" id='save-btn' class="btn btn-outline-success" value='Guardar'>
        </div>
      </div>
        
    </form>
    <div class="row">
      <div class="col-2">
        <a href="{!! route("view.work-positions") !!}" class="btn btn-outline-warning">Cancelar</a>
      </div>
    </div>
  </div>
</div>
@endsection