<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura_compra;
use App\Proveedor;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;

class Factura_compraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $factura_compras = Factura_compra::orderBy('id', 'desc')->paginate(15);
        
        return view('compra.dash', compact('factura_compras'));
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
        return view('compra.create', compact('proveedors'));
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
        $prov1 = $request->input("prov1");
        $fac = $request->input("fac");
        
        Factura_compra::create([
            'proveedor_id'=> $prov1,
            'facturacion' => $fac,
            'user_id' => Auth::user()->id
            ]);        
        return redirect()->route('facompras.index')->with('message', 'Item updated successfully.');

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
        $detalle_compras = Factura_compra::findOrFail($id)->detalle_compras;
        $productos = Producto::orderBy('id', 'desc')->paginate(10);
        $factura_compra = Factura_compra::findOrFail($id);
        return view('compra.show', compact('detalle_compras', 'productos', 'factura_compra'));
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
        $factura_compra = Factura_compra::findOrFail($id);
            
        return view('compra.edit', compact('factura_compra'));
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
        $factura_compra = Factura_compra::findOrFail($id);
        
        $factura_compra->delete();

        return redirect()->route('facompras.index')->with('message', 'Item deleted successfully.');
    }
}
