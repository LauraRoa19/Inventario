@extends('productos.layout')

@section('title')
<h1 class="text-center">AGREGAR PRODUCTO</h1>
<hr>
@endsection
@section('main')

@if (Session::has('message'))
  <div class="alert alert-info" >{{ Session::get('message')}}</div>
@endif
<form if="formUpdate" action="{{ route('productos.store')}}" method="POST" class="col-md-6 offset-md-3">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Lote</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inpLote" name="lote" onkeyup="isBlank()">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inpProducto" name="producto" onkeyup="isBlank()">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-5 col-form-label">Fecha de Vencimiento</label>
    <div class="col-sm-7">
      <input type="date" class="form-control" id="inpFecha" name="fechaVencimiento" onkeyup="isBlank()">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-5 col-form-label">Cantidad</label>
    <div class="col-sm-7">
      <input type="number" min="0" class="form-control" id="inpCantidad" name="cantidad" onkeyup="isBlank()">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-5 col-form-label">Precio Unitario</label>
    <div class="col-sm-7">
      <input type="number" min="0" class="form-control" id="inpPrecio" name="precio" onkeyup="isBlank()">
    </div>
  </div>
  <button id="btnCreate" type="submit" class="btn btn-primary col-md-2 offset-md-3 mb-4" disabled>Guardar</button>
  <a class="btn btn-warning mb-4" href="{{ route('productos.index')}}">Cancelar</a>
</form>


@endsection
