@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header"><br>
    <h3>Actualizar Departamento <i class="bi bi-bank"></i></h3>
    <h4> {!! $department->name !!} </h4>
  </div>
  @include('partials.messages')
    <div class="card-body"><br>
      <form  method="POST" action="{!! route('update.department', $department->department_id) !!}">
        @csrf
        @method('put')
        <div class="row">
          <div class="col-xl-6">
            <label class="form-label" for="name">*Nombre:</label>
            <input required class="form-control" type="text" name="name" id="name" value="{!! $department->name !!}">
          </div>
          <div class="col-xl-3">
            <label class="form-label" for="abbreviation">*Abreviación:</label>
            <input required class="form-control" type="text" name="abbreviation" id="abbreviation" value="{!! $department->abbreviation !!}">
          </div>
        </div>
        <div class="row">
          <div class="d-grid gap-2 col-xl-2">
              <button type="submit" id='save-btn' class="btn btn-outline-success"> Guardar </button>
          </div>
        </div>
      </form>
      <form method="POST" action="{!! route("delete.department", $department->department_id) !!}">
        @csrf
        @method('delete')
        <div class="row">
          <div class="col-xl-2">
            <a href="{!! route("view.departments") !!}" class="btn btn-outline-warning">Cancelar</a>
          </div>
          <div class="col-xl-2">
            <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#myModal{!! $department->department_id !!}">Eliminar</a>
          </div>
        </div>
        <div class="modal fade" id="myModal{!! $department->department_id !!}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar departamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>¿Está seguro de eliminar el departamento {!! $department->name !!}? 
                  Esto borrará todos los registros
                  que dependan de ella, como catálogos de Actividades, Actividades y evaluaciones. 
                  Si no quiere perder estos registros primero modifíquelos.
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" value="Eliminar" class="btn btn-outline-danger">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection