@extends('productos.layout')

@section('title')
<h3 class="text-center">PRODUCTO: {{$producto->producto}} </h3>
<hr>
@endsection

@section('main')

<form if="formUpdate" action="{{ route('productos.update',$producto->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Lote</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inpLote" name="lote" value="{{$producto->lote}}" >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inpProducto" name="producto" value="{{$producto->producto}}"  >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Fecha Vencimiento</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inpFechaVenc" name="fechaVencimiento" value="{{$producto->fechaVencimiento}}" >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Precio Unitario</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="inpPrecio" name="precio" value="{{$producto->precio}}" >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Cantidad</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="inpCantidad" name="cantidad" value="{{$producto->cantidad}}"  >
    </div>
  </div>
    <button type="submit" class="col-md-2 offset-md-2 btn btn-info mt-4 mb-4">Guardar</button>
    <a class="btn btn-warning" href="{{ route('productos.index')}}">Cancelar</a>
</form>

@endsection
