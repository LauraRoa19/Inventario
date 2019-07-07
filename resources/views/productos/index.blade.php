@extends('productos.layout')

@section('title')
<h1 class="text-center">PRODUCTOS</h1>
<hr>
@endsection
@section('main')

<div class="row">
  <div class="">
    <a class="btn btn-outline-info mb-4 ml-4" href="{{route('productos.create')}}" data-toggle="tooltip" data-placement="top" title="Agregar Producto">
      <i class="far fa-plus-square fa-lg"></i>
    </a>
  </div>
</div>

@if (Session::has('message'))
  <div class="alert alert-info" >{{ Session::get('message')}}</div>
@endif
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">lote</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fecha Vencimiento</th>
      <th scope="col">Precio</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
    <tr>
      <th scope="row">{{ $producto->id}}</th>
      <td><input readonly class="inp inp-edit-{{ $producto->id}}" name="id" value="{{ $producto->lote}}"></td>
      <td><input readonly class="inp inp-edit-{{ $producto->id}}" name="producto" value="{{ $producto->producto}}"></td>
      <td><input readonly class="inp inp-edit-{{ $producto->id}}" name="cantidad" value="{{ $producto->cantidad}}"></td>
      <td><input readonly class="inp inp-edit-{{ $producto->id}}" name="fechaVencimiento" value="{{ $producto->fechaVencimiento}}"></td>
      <td><input readonly class="inp inp-edit-{{ $producto->id}}" name="precio" value="$ {{ $producto->precio}}"></td>
      <td>
        <a id="" class="btn btn-outline-info" href="{{ route('productos.edit',$producto->id)}}" data-toggle="tooltip" data-placement="top" title="Editar">
          <i class="fas fa-edit fa-lg"></i>
        </a>
      </td>
      <td>
        <form action="{{ route('productos.destroy',$producto->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button id="btnDelete" type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Esta seguro que quiere borrar {{$producto->producto}}?')"  data-toggle="tooltip" data-placement="top" title="Eliminar">
            <i class="fas fa-trash-alt fa-lg"></i>
          </button>
        </from>
      </td>
      <td>
        <a id="btnComprar" href="{{ route('productos.comprar', $producto->id)}}" class="btn btn-outline-dark ml-4" data-toggle="tooltip" data-placement="top" title="Comprar Productos">
          <i class="fas fa-money-check-alt fa-lg"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $productos->links()}}

@endsection
