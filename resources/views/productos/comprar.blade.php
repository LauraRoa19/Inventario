@extends('productos.layout')

@section('title')
<h3 class="text-center">PRODUCTO: {{$producto->producto}} </h3>
<h4 class="text-center" style="color:rgb(250,1,1)" >Cantidad disponible: {{$producto->cantidad}} </h4>
<hr>
@endsection

@section('main')

<form if="formUpdate" action="{{ route('productos.confirm',$producto->id)}}" method="POST" class="col-md-8 offset-md-3">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-4">
      <input type="text" class="form-control-plaintext" readonly id="inpProducto" name="producto" value="{{$producto->producto}}"  >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Precio Unitario</label>
    <div class="col-sm-4">
      <input type="number" class="form-control-plaintext" readonly id="inpPrecio" name="precio" value="{{$producto->precio}}" >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Cantidad</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="inpCantidad" name="cantidad" value="" onkeyup="setTotal(this.value)" >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Precio Total</label>
    <div class="col-sm-4">
      <input type="decimal" class="form-control" id="inpTotal" name="total" readonly >
    </div>
  </div>
    <button type="submit" class="col-md-2 offset-md-2 btn btn-info mt-4 mb-4">Compar</button>
    <a class="btn btn-warning" href="{{ route('productos.index')}}">Cancelar</a>
</form>

@endsection
