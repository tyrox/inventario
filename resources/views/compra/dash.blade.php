@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Tus compras
                	<a class="btn btn-xs btn-primary" href="{{ route('facompras.create') }}"><i class="glyphicon glyphicon-plus-sign"></i></a>
                </div>   
                <div>
                	<div class="col-md-12">
            			@if($factura_compras->count())
                		<table class="table table-condensed table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Proveedor</th>
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
		                        @foreach($factura_compras as $factura_compra)
		                            <tr>
		                                <td>{{$factura_compra->id}}</td>
		                                <td>{{$factura_compra->proveedor->nombre}}</td>
		                    			<td>{{$factura_compra->monto_factura}}</td>
		                    			<td>{{$factura_compra->monto_descuento}}</td>
		                    			<td>{{$factura_compra->monto_impuesto}}</td>
		                    			<td>{{$factura_compra->monto_total}}</td>
		                    			<td>{{$factura_compra->facturacion}}</td>
		                    			<td>{{$factura_compra->user->name}}</td>
		                                <td class="text-right">		                                    
		                                    <a class="btn btn-xs btn-warning" href="{{ route('facompras.edit', $factura_compra->id) }}"><i class="glyphicon glyphicon-cog"></i></a>
		                                    <form action="{{ route('facompras.destroy', $factura_compra->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		                                        <input type="hidden" name="_method" value="DELETE">
		                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
		                                    </form>
		                                </td>
		                            </tr>
		                        @endforeach
		                    </tbody>
                		</table>
                		{!! $factura_compras->render() !!}
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