@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">Tus ventas
                	<a class="btn btn-xs btn-primary" href="{{ route('faventas.create') }}"><i class="glyphicon glyphicon-plus-sign"></i></a>
                </div>   
                <div>
                	<div class="col-md-12">
            			@if($factura_ventas->count())
                		<table class="table table-hover table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Cliente</th>
		                        	<th>Monto</th>
		                        	<th>Descuento</th>
		                        	<th>Impuesto</th>
		                        	<th>Total</th>
		                        	<th>Facturacion</th>
		                        	<th><i class="glyphicon glyphicon-user"></i>Usuario</th>
		                            <th class="text-right">OPTIONS</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($factura_ventas as $factura_venta)
		                            <tr>
		                                <td>{{$factura_venta->id}}</td>
		                                <td>{{$factura_venta->cliente->nombre}}</td>
		                    			<td>{{$factura_venta->monto_factura}}</td>
		                    			<td>{{$factura_venta->monto_descuento}}</td>
		                    			<td>{{$factura_venta->monto_impuesto}}</td>
		                    			<td>{{$factura_venta->monto_total}}</td>
		                    			<td>{{$factura_venta->facturacion}}</td>
		                    			<td>{{$factura_venta->user->name}}</td>
		                                <td class="text-right">		                                    
		                                    <a class="btn btn-xs btn-warning" href="{{ route('faventas.edit', $factura_venta->id) }}"><i class="glyphicon glyphicon-cog"></i></a>
		                                    @if ($factura_venta->monto_total > 0)
		                                    @else
		                                    <form action="{{ route('faventas.destroy', $factura_venta->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		                                        <input type="hidden" name="_method" value="DELETE">
		                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
		                                    </form>
		                                    @endif
		                                </td>
		                            </tr>
		                        @endforeach
		                    </tbody>
                		</table>
                		{!! $factura_ventas->render() !!}
			            @else
			                <h3 class="text-center alert alert-info">No hay facturas registradas!</h3>
			            @endif
        			</div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection