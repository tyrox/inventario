@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Productos asociados, factura # {{$factura_venta->id}}                	
                </div>   
                <div>
                	<div class="col-md-12">
            			@if($detalle_ventas->count())
                		<table class="table table-condensed table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                        	<th>Factura</th>
		                        	<th>Producto</th>
		                        	<th>Precio</th>
		                        	<th>Venta</th>
		                        	<th>Cantidad</th>
		                        	<th>Impuesto</th>
		                            <th class="text-right">OPTIONS</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($detalle_ventas as $detalle_venta)
		                            <tr>
		                                <td>{{$detalle_venta->id}}</td>
		                                <td>{{$detalle_venta->factura_venta_id}}</td>
		                    			<td>{{$detalle_venta->producto->nombre}}</td>
		                    			<td>{{$detalle_venta->precio_costo}}</td>
		                    			<td>{{$detalle_venta->precio_venta}}</td>
		                    			<td>{{$detalle_venta->cantidad_venta}}</td>
		                    			<td>{{$detalle_venta->impuesto_venta}}</td>
		                                <td class="text-right">	
		                                	@if ($factura_venta->monto_total > 0)
		                                 	@else
		                                    <form action="{{ route('deventas.destroy', $detalle_venta->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
                		
			            @else
			                <h3 class="text-center alert alert-info">No ha agregado productos a esta factura!</h3>
			            @endif
			            <div class="panel panel-info">
			            	@if ($factura_venta->monto_total > 0)
							@else
							<div class="panel-heading">
							    <h3 class="panel-title">Agregar productos</h3>
							</div>
							<div class="panel-body">
					            <form class="form" method="POST" action="{{ route('deventas.store') }}">
					            	{{ csrf_field() }}			                        
			                        <div class="form-group{{ $errors->has('existencia') ? ' has-error' : '' }}">
			                            <label for="existencia" class="col-md-1 control-label">Cantidad</label>

			                            <div class="col-md-3">
			                                <input id="existencia" type="number" class="form-control" name="existencia" value="{{ old('existencia') }}" required autofocus>

			                                @if ($errors->has('existencia'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('existencia') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>

			                        <div class="form-group{{ $errors->has('producto') ? ' has-error' : '' }}">
			                            <label for="producto" class="col-md-1 control-label">Productos:</label>
			                            <div class="col-md-2">                                
			                                <select name="producto" class="custom-select custom-select-sm">
			                                    @foreach($productos as $producto)
			                                    <option name="producto"value="{{ $producto->id }}">{{ $producto->nombre }}</option>
			                                    @endforeach
			                                </select>
			                                @if ($errors->has('producto'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('producto') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
			                        

			                        <div class="form-group{{ $errors->has('factura_venta') ? ' has-error' : '' }}">
			                            <label for="factura_venta" class="col-md-2 control-label"></label>
			                            <div class="col-md-3">
			                                <input id="factura_venta" type="hidden" class="form-control" name="factura_venta" value="{{$factura_venta->id}}" required autofocus>
			                            </div>
			                        </div>			                        

			                        <div class="form-group">
			                            <div class="col-6 col-md-offset-6">
			                                <button type="submit" class="btn btn-primary">
			                                    <i class="glyphicon glyphicon-plus"></i>
			                                </button>
			                            </div>
			                        </div>
			                        
					           	</form>
					           	
				           	</div>
				           	@endif
				           	<a class="btn btn-link" href="{{ route('faventas.edit', $factura_venta->id) }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
			            </div>
        			</div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection