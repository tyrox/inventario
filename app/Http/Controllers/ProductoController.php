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
        $proveedors = Proveedor::orderBy('id', 'desc')->paginate(10);
        return view('producto.create', compact('proveedors'));
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
        $departamento = $request->input("departamento");
        $iv = $request->input("iv");
        $prov1 = $request->input("prov1");
        $prov2 = $request->input("prov2");
        $precio = $request->input("precio");
        $publico = $request->input("publico");        
        $existencia = $request->input("existencia");
        Producto::create([
            'nombre'=> $name,
            'descripcion' => $descrip,
            'departamento' => $departamento,
            'iv' => $iv,
            'proveedor1' => $prov1,
            'proveedor2' => $prov2,
            'precio_costo' => $precio,
            'precio_publico' => $publico,
            'existencia' => $existencia
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
        $proveedor = Proveedor::orderBy('id', 'desc')->paginate(10);
        return view('producto.show', compact('producto', 'proveedor'));
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
        $proveedors = Proveedor::orderBy('id', 'desc')->paginate(10);
        return view('producto.edit', compact('producto', 'proveedors'));
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

        $producto->nombre = $request->input("nombre");
        $producto->descripcion = $request->input("description");
        $producto->departamento = $request->input("departamento");
        $producto->iv = $request->input("iv");
        $producto->proveedor1 = $request->input("prov1");
        $producto->proveedor2 = $request->input("prov2");
        $producto->precio_costo = $request->input("precio");
        $producto->precio_publico = $request->input("publico");        
        $producto->existencia = $request->input("existencia");

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
