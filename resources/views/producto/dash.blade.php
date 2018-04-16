@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tus productos
                	<a class="btn btn-xs btn-primary" href="{{ route('productos.create') }}"><i class="glyphicon glyphicon-plus-sign"></i></a>
                </div>   
                <div>
                	<div class="col-md-12">
            			@if($productos->count())
                		<table class="table table-condensed table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Nombre</th>
		                        	<th>Descripción</th>
		                        	<th>Cantidad</th>
		                        	<th>$ Precio</th>
		                        	<th># sede</th>
		                            <th class="text-right">OPTIONS</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($productos as $producto)
		                            <tr>
		                                <td>{{$producto->id}}</td>
		                                <td>{{$producto->nombre}}</td>
		                    			<td>{{$producto->descripcion}}</td>
		                    			<td>{{$producto->cantidad}}</td>
		                    			<td>{{$producto->precio}}</td>
		                    			<td>{{$producto->id_sede}}</td>
		                                <td class="text-right">
		                                    <a class="btn btn-xs btn-primary" href="{{ route('productos.show', $producto->id) }}"><i class="glyphicon glyphicon-zoom-in"></i> </a>
		                                    <a class="btn btn-xs btn-warning" href="{{ route('productos.edit', $producto->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
		                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		                                        <input type="hidden" name="_method" value="DELETE">
		                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
		                                    </form>
		                                </td>
		                            </tr>
		                        @endforeach
		                    </tbody>
                		</table>
                		{!! $productos->render() !!}
			            @else
			                <h3 class="text-center alert alert-info">No hay productos registrados!</h3>
			            @endif
        			</div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection