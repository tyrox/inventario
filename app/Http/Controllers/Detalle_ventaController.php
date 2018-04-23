<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Detalle_ventaController extends Controller
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
                //
        $producto = Producto::findOrFail($request->input("producto"));
        $cantidad = $request->input("existencia");
        $factura_compra = $request->input("factura_compra");
        $factura_compra_up = Factura_compra::findOrFail($factura_compra);
        $descuento = $request->input("descuento");
        if ($producto->existencia >= $cantidad) {
            # code...
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

            //Descuento total para este producto
            $total_descuento = ($total_Compra * $descuento)/100;

            //Impuesto total para este producto
            $total_impuesto = ($total_Compra * $producto->iv)/100;

            $factura_compra_up->monto_factura = $total;
            $factura_compra_up->monto_descuento = $total_descuento;
            $factura_compra_up->monto_impuesto = $total_impuesto;

            $factura_compra_up->save();

            $producto->existencia = $producto->existencia + $cantidad;
        }
        
        
        return redirect()->route('facompras.index')->with('message', 'Item added successfully.');
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
    }
}
