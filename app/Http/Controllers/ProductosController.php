<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;
use Session;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = productos::paginate(4);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'lote'=> 'required',
          'producto' => 'required',
          'fechaVencimiento' => 'required',
          'cantidad' => 'required',
          'precio' => 'required',
        ]);

        productos::create($request->all());
        session::flash('message','Se ha agregado un nuevo producto');
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $producto = productos::findOrFail($id);
      return view('productos.editar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $producto = productos::findOrFail($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(productos $producto)
    {
        $producto->delete();
        session::flash('message','Se ha eliminado correctamente');
        return redirect()->route('productos.index');
    }

    public function buy($id)
    {
      $producto = productos::findOrFail($id);
      return view('productos.comprar', compact('producto'));
    }

    public function confirm_buy(Request $request, $id)
    {
      $producto = productos::findOrFail($id);
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
