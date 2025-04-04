@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header"><br>
    <h3>Ver Administradores <i class="bi bi-person"></i></h3>
    <div class="row justify-content-end">
      <div class="col-2">
        <a href={!! route('create.administrator') !!} class="btn btn-outline-success">Alta de administrador</a>
      </div>
      <div class="col-1">
        <a class="btn btn-outline-primary" onclick="blockSearchDiv()">Buscar</a>
      </div>
      <div class="col-2">
        <a href={!! route('home') !!} class="btn btn-outline-warning">Regresar</a>
      </div>
    </div>
  </div>
  @include('partials.messages')
  <div class="card-body"><br>

    {{-- Form for search --}}
    <div id="search-div" style="display:none;">
      <form method="GET" action="{!! route('search.administrators') !!}">
        @csrf
        @method('get')
        <div class="row">
          <div class="col-xl-6">
            <label class="form-label" for="words">Buscar administrador:</label>
            <input required class="form-control" type="text" name="words" id="words" value="{!! old('words') !!}">
          </div>
          <div class="col-xl-3">
            <label class="form-label" for="search-type">Buscar por:</label>
            <select class="form-select" name="search_type" id="search_type">
              <option selected value='name'>Nombre</option>
              <option value='username'>Nombre de usuario</option>
            </select>
          </div>
          <div class="col-xl-2 mt-auto">
            <input type="submit" id='search-btn' class="btn btn-outline-success" value='Buscar'>
          </div>
        </div>
        <hr>
      </form>
    </div>

    @if($administrators->isNotEmpty())

      <div class="row">
        <div class="col-xl-4">
          <h6>Nombre</h6>
        </div>
        <div class="col-xl-4">
          <h6>Departmaneto</h6>
        </div>
      </div>

      @foreach ($administrators as $administrator)
        <div class="row row-list" style="margin: 1%">
          <div class="col-xl-4 mt-auto mb-auto">
            {!! $administrator->name.' '.$administrator->last_name.' '.$administrator->mothers_last_name !!}
          </div>
          <div class="col-xl-4 mt-auto mb-auto">
            @if($administrator->department_abbreviation)
              {!! $administrator->department_abbreviation !!}
            @else
              Mantenimiento del sistema
            @endif
          </div>
          <div class="col-xl-2 mt-auto mb-auto">
            <a href={!! route('edit.administrator', $administrator->administrator_id) !!} class="btn btn-outline-primary">Actualizar</a>
          </div>
          <div class="col-xl-2 mt-auto mb-auto">
            <form method="POST" action="{!! route('delete.administrator', $administrator->administrator_id) !!}">
              @csrf
              @method('delete')
              <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#myModal{!! $administrator->administrator_id !!}">Eliminar</a>
              <div class="modal fade" id="myModal{!! $administrator->administrator_id !!}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Eliminar administrador</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>¿Está seguro de eliminar al administrador 
                        {!! $administrator->name.' '.
                            $administrator->last_name.' '.
                            $administrator->mothers_last_name!!}?
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <input type="submit" value="Eliminar" class="btn btn-outline-danger">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      @endforeach
    @elseif($administrators->isEmpty())
      <div class="row">
        <div class="col-xl-6">
          No hay administradores en la base de datos.
        </div>
      </div>
    @endif
  </div>
</div>
@endsection