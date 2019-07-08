<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Session;

class ProductosController extends Controller
{

    public function index()
    {
        $productos = Producto::paginate(4);
        return view('productos.index', compact('productos'));
    }


    public function create()
    {
        return view('productos.crear');
    }


    public function store(Request $request)
    {
        $request->validate([
          'lote'=> 'required',
          'producto' => 'required',
          'fechaVencimiento' => 'required',
          'cantidad' => 'required',
          'precio' => 'required',
        ]);

        Producto::create($request->all());
        session::flash('message','Se ha agregado un nuevo producto');
        return redirect()->route('productos.index');
    }


    public function show(productos $productos)
    {
        //
    }


    public function edit($id)
    {
      $producto = Producto::findOrFail($id);
      return view('productos.editar', compact('producto'));
    }


    public function update(Request $request, $id)
    {
      $producto = Producto::findOrFail($id);
      $request->validate([
        'lote'=> 'required',
        'producto' => 'required',
        'fechaVencimiento' => 'required',
        'cantidad' => 'required',
        'precio' => 'required',
      ]);
      $producto->update($request->all());
      session::flash('message','Se ha actualizado exitosamente');
      return redirect()->route('productos.index');
    }


    public function destroy(productos $producto)
    {
        $producto->delete();
        session::flash('message','Se ha eliminado correctamente');
        return redirect()->route('productos.index');
    }

    public function buy($id)
    {
      $producto = Producto::findOrFail($id);
      return view('productos.comprar', compact('producto'));
    }

    public function confirm_buy(Request $request, $id)
    {
      $producto = Producto::findOrFail($id);
      $cantidadInventario = $producto->cantidad;
      $request->validate([
        'cantidad' => 'required',
      ]);
      if ($cantidadInventario >= $request->cantidad) {
        $producto->cantidad = $cantidadInventario - $request->cantidad;
        $producto->save();
        flash('Detalles de Compra.')->success();
        flash('Producto: '.$producto->producto)->success();
        flash('Cantidad: '.$request->cantidad)->success();
        flash('Precio unitario: '.$producto->precio)->success();
        flash('Precio Total: '.$producto->precio * $request->cantidad)->success();
        return redirect()->route('productos.index');
      }else{
        flash('No puede comprar una cantidad superior a la del inventario: '.$cantidadInventario)->error()->important();
        return back();
      }

    }
}
