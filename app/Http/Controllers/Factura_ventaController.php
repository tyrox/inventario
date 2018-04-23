<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura_venta;
use App\Cliente;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;

class Factura_ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $factura_ventas = Factura_venta::orderBy('id', 'desc')->paginate(15);
        
        return view('venta.dash', compact('factura_ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = CLiente::orderBy('id', 'desc')->paginate(10);
        return view('venta.create', compact('clientes'));
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
        $cliente = $request->input("cliente");
        $fac = $request->input("fac");
        
        Factura_venta::create([
            'cliente_id'=> $cliente,
            'facturacion' => $fac,
            'user_id' => Auth::user()->id
            ]);        
        return redirect()->route('faventas.index')->with('message', 'Item updated successfully.');
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
        $detalle_ventas = Factura_venta::findOrFail($id)->detalle_ventas;
        $productos = Producto::orderBy('id', 'desc')->paginate(10);
        $factura_venta = Factura_venta::findOrFail($id);
        return view('venta.show', compact('detalle_ventas', 'productos', 'factura_venta'));
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
        $factura_venta = Factura_venta::findOrFail($id);
            
        return view('venta.edit', compact('factura_venta'));
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
        $factura_venta = Factura_venta::findOrFail($id);
        
        $descuento = $request->input("descuento");

        $total_descuento = ($factura_venta->monto_factura * $descuento)/100;
        $factura_venta->monto_descuento = $total_descuento;
        $factura_venta->monto_total = $factura_venta->monto_factura - $total_descuento +
            $factura_venta->monto_impuesto;


        $factura_venta->save();

        $factura_ventas = Factura_venta::orderBy('id', 'desc')->paginate(15);
        return view('venta.dash', compact('factura_ventas'));
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
        $factura_venta = Factura_venta::findOrFail($id);
        
        $factura_venta->delete();

        return redirect()->route('faventas.index')->with('message', 'Item deleted successfully.');
    }
}
