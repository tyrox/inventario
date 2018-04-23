@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Productos asociados, factura # {{$factura_compra->id}}                	
                </div>   
                <div>
                	<div class="col-md-12">
            			@if($detalle_compras->count())
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
		                        @foreach($detalle_compras as $detalle_compra)
		                            <tr>
		                                <td>{{$detalle_compra->id}}</td>
		                                <td>{{$detalle_compra->factura_compra_id}}</td>
		                    			<td>{{$detalle_compra->producto->nombre}}</td>
		                    			<td>{{$detalle_compra->precio_costo}}</td>
		                    			<td>{{$detalle_compra->precio_venta}}</td>
		                    			<td>{{$detalle_compra->cantidad_compra}}</td>
		                    			<td>{{$detalle_compra->impuesto}}</td>
		                                <td class="text-right">
		                                	@if ($factura_compra->monto_total > 0)
		                                    @else	                                    
		                                    <form action="{{ route('decompras.destroy', $detalle_compra->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
			            	@if ($factura_compra->monto_total > 0)
		                    @else
							<div class="panel-heading">
							    <h3 class="panel-title">Agregar productos</h3>
							</div>
							<div class="panel-body">
					            <form class="form" method="POST" action="{{ route('decompras.store') }}">
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
			                        

			                        <div class="form-group{{ $errors->has('factura_compra') ? ' has-error' : '' }}">
			                            <label for="factura_compra" class="col-md-2 control-label"></label>
			                            <div class="col-md-3">
			                                <input id="factura_compra" type="hidden" class="form-control" name="factura_compra" value="{{$factura_compra->id}}" required autofocus>
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
				           	<a class="btn btn-link" href="{{ route('facompras.edit', $factura_compra->id) }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
			            </div>
        			</div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection