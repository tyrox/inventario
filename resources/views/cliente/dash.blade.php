@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Clientes
                	<a class="btn btn-xs btn-primary" href="{{ route('clientes.create') }}"><i class="glyphicon glyphicon-plus-sign"></i></a>
                </div>
                <div>
                	<div class="col-md-12">
            			@if($clientes->count())
                		<table class="table table-condensed table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Nombre</th>
		                        	<th>Cédula</th>
		                        	<th>Dirección</th>
		                        	<th>Teléfono</th>
		                        	<th>Teléfono</th>
		                        	<th>Facturación</th>
		                            <th class="text-right">OPTIONS</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($clientes as $cliente)
		                            <tr>
		                                <td>{{$cliente->id}}</td>
		                                <td>{{$cliente->nombre}}</td>
		                    			<td>{{$cliente->cedula}}</td>
		                    			<td>{{$cliente->direccion}}</td>
		                    			<td>{{$cliente->telefono1}}</td>
		                    			<td>{{$cliente->telefono2}}</td>
		                    			<td>{{$cliente->facturacion}}</td>                    			
		                                <td class="text-right">
		                                    <a class="btn btn-xs btn-primary" href="{{ route('clientes.show', $cliente->id) }}"><i class="glyphicon glyphicon-zoom-in"></i></a>
		                                    <a class="btn btn-xs btn-warning" href="{{ route('clientes.edit', $cliente->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
		                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		                                        <input type="hidden" name="_method" value="DELETE">
		                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
		                                    </form>
		                                </td>
		                            </tr>
		                        @endforeach
		                    </tbody>
                		</table>
                		{!! $clientes->render() !!}
			            @else
			                <h3 class="text-center alert alert-info">Empty!</h3>
			            @endif
        			</div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection