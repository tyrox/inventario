<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura_compra;
use App\Detalle_compra;
use App\Proveedor;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;

class Detalle_compraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $producto = Producto::findOrFail($request->input("producto"));
        $cantidad = $request->input("existencia");
        $factura_compra = $request->input("factura_compra");
        $factura_compra_up = Factura_compra::findOrFail($factura_compra);
        
        
        Detalle_compra::create([
            'factura_compra_id'=>$factura_compra,
            'producto_id' => $request->input("producto"),
            'precio_costo' => $producto->precio_costo,
            'precio_venta'=> $producto->precio_publico,
            'cantidad_compra' => $cantidad,
            'impuesto' => $producto->iv
        ]);
        //costo del producto por la cantidad
        $total_Compra = ($cantidad * $producto->precio_costo);

        //Costo total de la compra más lo que haya en la factura
        $total = $total_Compra + $factura_compra_up->monto_factura;

        

        //Impuesto total para este producto
        $total_impuesto = ($total_Compra * $producto->iv)/100;

        $factura_compra_up->monto_factura = $total;
        
        $factura_compra_up->monto_impuesto = $total_impuesto + $factura_compra_up->monto_impuesto;

        $producto->existencia = $producto->existencia + $cantidad;

        $factura_compra_up->save();
        $producto->save();

        
        
        
        
        return redirect()->route('facompras.show', $factura_compra)->with('message', 'Item added successfully.');
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
        $detalle_compra = Detalle_compra::findOrFail($id);
        $producto = Producto::findOrFail($detalle_compra->producto_id);
        $factura_compra_up = Factura_compra::findOrFail($detalle_compra->factura_compra_id);

        //costo del producto por la cantidad
        $total_Compra = ($detalle_compra->precio_costo * $detalle_compra->cantidad_compra);

        //Costo total de la compra más lo que haya en la factura
        $total =  $factura_compra_up->monto_factura - $total_Compra;
        

        //Impuesto total para este producto
        $total_impuesto = ($total_Compra * $producto->iv)/100;

        $factura_compra_up->monto_factura = $total;
        
        $factura_compra_up->monto_impuesto = $factura_compra_up->monto_impuesto - $total_impuesto;

        $producto->existencia = $producto->existencia - $detalle_compra->cantidad_compra;

        $factura_compra_up->save();
        $producto->save();   

        $detalle_compra->delete();

        return redirect()->route('facompras.show', $detalle_compra->factura_compra_id)->with('message', 'Item deleted successfully.');
    }
}
