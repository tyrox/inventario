<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Producto;
use App\Proveedor;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::orderBy('id', 'desc')->paginate(15);
        
        return view('producto.dash', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedor = Proveedor::orderBy('id', 'desc')->paginate(10);
        return view('producto.create', compact('proveedor'));
        //prueba
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input("name");
        $descrip = $request->input("descrip");
        $cantidad = $request->input("cant");
        $id_sede = $request->input("sede");
        $precio = $request->input("precio");
        Producto::create([
            'nombre'=> $name,
            'descripcion' => $descrip,
            'cantidad' => $cantidad,
            'id_sede' => $id_sede,
            'precio' => $precio
            ]);        
        return redirect()->route('productos.index')->with('message', 'Item updated successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producto = Producto::findOrFail($id);
        $sedes = Sede::orderBy('id', 'desc')->paginate(10);
        return view('producto.show', compact('producto', 'sedes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto::findOrFail($id);
        $sedes = Sede::orderBy('id', 'desc')->paginate(10);
        return view('producto.edit', compact('producto', 'sedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $producto = Producto::findOrFail($id);

        $producto->id = $id;
        $producto->nombre = $request->input("nombre");
        $producto->descripcion = $request->input("description");
        $producto->cantidad = $request->input("cantidad");
        $producto->id_sede = $request->input("sede");
        $producto->precio = $request->input("precio");

        $producto->save();

        return redirect()->route('productos.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('message', 'Item deleted successfully.');
    }
}
