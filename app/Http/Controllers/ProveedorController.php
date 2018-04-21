<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Producto;
use App\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $proveedors = Proveedor::orderBy('id', 'desc')->paginate(15);
        
        return view('proveedor.dash', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedor.create');
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
        $correo = $request->input("correo");
        $direccion = $request->input("dir");
        $telefono1 = $request->input("tel1");
        $telefono2 = $request->input("tel2");
        $contacto = $request->input("contacto");
        Proveedor::create([
            'nombre'=> $name,
            'correo' => $correo,
            'direccion' => $direccion,
            'telefono1' => $telefono1,
            'telefono2' => $telefono2,
            'contacto' => $contacto
            ]);        
        return redirect()->route('proveedors.index')->with('message', 'Item updated successfully.');
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
        $proveedor = Proveedor::findOrFail($id);        
        return view('proveedor.show', compact('proveedor'));
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
        $proveedor = Proveedor::findOrFail($id);        
        return view('proveedor.edit', compact('proveedor'));
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
        $proveedor = Proveedor::findOrFail($id);

        $proveedor->id = $id;
        $proveedor->nombre = $request->input("name");
        $proveedor->correo = $request->input("correo");
        $proveedor->direccion = $request->input("dir");
        $proveedor->telefono1 = $request->input("tel1");
        $proveedor->telefono2 = $request->input("tel2");
        $proveedor->contacto = $request->input("contacto");

        $proveedor->save();

        return redirect()->route('proveedors.index')->with('message', 'Item updated successfully.');
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
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedors.index')->with('message', 'Item deleted successfully.');
    }
}
