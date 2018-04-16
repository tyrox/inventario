<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Sede;
use App\Producto;

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
        $sedes = Sede::orderBy('id', 'desc')->paginate(10);
        return view('producto.create', compact('sedes'));
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
        $sede = Sede::findOrFail($id);

        return view('sede.show', compact('sede'));
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
        $sede = Sede::findOrFail($id);

        return view('sede.edit', compact('sede'));
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
    }
}
