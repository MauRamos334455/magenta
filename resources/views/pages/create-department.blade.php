@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header"><br>
    <h3>Crear Departamento <i class="bi bi-bank"></i></h3>
  </div>
  @include('partials.messages')
  <div class="card-body"><br>
    <form  method="POST" action="{!! route('store.department') !!}">
      @csrf
      @method('post')
      <div class="row">
        <div class="col-xl-6">
          <label class="form-label" for="name">*Nombre:</label>
          <input required class="form-control" type="text" name="name" id="name" placeholder="Ej. Formación Académica" value="{!! old('name') !!}">
        </div>
        <div class="col-xl-3">
          <label class="form-label" for="abbreviation">*Abreviatura:</label>
          <input required class="form-control" type="text" name="abbreviation" id="abbreviation" placeholder="Ej. FA" value="{!! old('abbreviation') !!}">
        </div>
      </div>
      <div class="row">
        <div class="col-2">
          <a href="{!! route("view.departments") !!}" class="btn btn-outline-warning">Cancelar</a>
        </div>
        <div class="d-grid gap-2 col-xl-2 mt-auto">
          <button type="submit" id='save-btn' class="btn btn-outline-success"> Guardar </button>
        </div>
      </div>
    </form>
    <div class="row">
    </div>
  </div>
</div>
@endsection