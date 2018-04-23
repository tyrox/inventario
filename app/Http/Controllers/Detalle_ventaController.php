<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura_venta;
use App\Detalle_venta;
use App\Cliente;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $factura_venta = $request->input("factura_venta");
        
        
        if ($producto->existencia >= $cantidad) {
            # code...
            Detalle_venta::create([
                'factura_venta_id'=>$factura_venta,
                'producto_id' => $request->input("producto"),
                'precio_costo' => $producto->precio_costo,
                'precio_venta'=> $producto->precio_publico,
                'cantidad_venta' => $cantidad,
                'impuesto_venta' => $producto->iv
            ]);
            $venta = Factura_venta::findOrFail($factura_venta);
            //costo del producto por la cantidad
            $total_venta = $cantidad*$producto->precio_publico;

            //Costo total de la compra más lo que haya en la factura
            $total = $total_venta + $venta->monto_factura;            

            //Impuesto total para este producto
            $total_impuesto = ($total_venta * $producto->iv)/100;

            $venta->monto_factura = $total;            
            $venta->monto_impuesto = $total_impuesto;
            
            $venta->save();

            $producto->existencia = $producto->existencia - $cantidad;            
            $producto->save();            
        }
        
        
        return redirect()->route('faventas.show', $factura_venta)->with('message', 'Item added successfully.');
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

        $detalle_venta = Detalle_venta::findOrFail($id);
        $producto = Producto::findOrFail($detalle_venta->producto_id);
        $factura_venta_up = Factura_venta::findOrFail($detalle_venta->factura_venta_id);


        //costo del producto por la cantidad
        $total_venta = ($detalle_venta->precio_venta * $detalle_venta->cantidad_venta);

        //Costo total de la compra más lo que haya en la factura
        $total =  $factura_venta_up->monto_factura - $total_venta;
        

        //Impuesto total para este producto
        $total_impuesto = ($total_venta * $producto->iv)/100;

        $factura_venta_up->monto_factura = $total;
        
        $factura_venta_up->monto_impuesto = $factura_venta_up->monto_impuesto - $total_impuesto;

        $producto->existencia = $producto->existencia + $detalle_venta->cantidad_venta;

        $factura_venta_up->save();
        $producto->save();   

        $detalle_venta->delete();

        return redirect()->route('faventas.show', $detalle_venta->factura_venta_id)->with('message', 'Item deleted successfully.');
    }
}
