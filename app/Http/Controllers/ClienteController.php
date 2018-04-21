<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Producto;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::orderBy('id', 'desc')->paginate(15);
        
        return view('cliente.dash', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');

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
        $cedula = $request->input("ced");
        $direccion = $request->input("dir");
        $telefono1 = $request->input("tel1");
        $telefono2 = $request->input("tel2");
        $facturacion = $request->input("fac");
        Cliente::create([
            'nombre'=> $name,
            'cedula' => $cedula,
            'direccion' => $direccion,
            'telefono1' => $telefono1,
            'telefono2' => $telefono2,
            'facturacion' => $facturacion
            ]);        
        return redirect()->route('clientes.index')->with('message', 'Item updated successfully.');
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
        $cliente = Cliente::findOrFail($id);        
        return view('cliente.show', compact('cliente'));
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
        $cliente = Cliente::findOrFail($id);        
        return view('cliente.edit', compact('cliente'));
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
        $cliente = Cliente::findOrFail($id);

        $cliente->id = $id;
        $cliente->nombre = $request->input("name");
        $cliente->cedula = $request->input("ced");
        $cliente->direccion = $request->input("dir");
        $cliente->telefono1 = $request->input("tel1");
        $cliente->telefono2 = $request->input("tel2");
        $cliente->facturacion = $request->input("fac");

        $cliente->save();

        return redirect()->route('clientes.index')->with('message', 'Item updated successfully.');
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
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('message', 'Item deleted successfully.');
    }
}
