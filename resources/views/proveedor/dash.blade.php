@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Proveedores
                	<a class="btn btn-xs btn-primary" href="{{ route('proveedors.create') }}"><i class="glyphicon glyphicon-plus-sign"></i></a>
                </div>
                <div>
                	<div class="col-md-12">
            			@if($proveedors->count())
                		<table class="table table-condensed table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Nombre</th>
		                        	<th><i class="glyphicon glyphicon-phone-alt"></i></th>
		                        	<th><i class="glyphicon glyphicon-phone-alt"></i></th>
		                        	<th>Correo</th>
		                        	<th>Dirección</th>
		                        	<th>Contacto</th>
		                            <th class="text-right">OPTIONS</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($proveedors as $proveedor)
		                            <tr>
		                                <td>{{$proveedor->id}}</td>
		                                <td>{{$proveedor->nombre}}</td>
		                    			<td>{{$proveedor->telefono1}}</td>
		                    			<td>{{$proveedor->telefono2}}</td>
		                    			<td>{{$proveedor->correo}}</td>
		                    			<td>{{$proveedor->direccion}}</td>
		                    			<td>{{$proveedor->contacto}}</td>                    			
		                                <td class="text-right">
		                                    <a class="btn btn-xs btn-primary" href="{{ route('proveedors.show', $proveedor->id) }}"><i class="glyphicon glyphicon-zoom-in"></i></a>
		                                    <a class="btn btn-xs btn-warning" href="{{ route('proveedors.edit', $proveedor->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
		                                    <form action="{{ route('proveedors.destroy', $proveedor->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		                                        <input type="hidden" name="_method" value="DELETE">
		                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
		                                    </form>
		                                </td>
		                            </tr>
		                        @endforeach
		                    </tbody>
                		</table>
                		{!! $proveedors->render() !!}
			            @else
			                <h3 class="text-center alert alert-info">No hay proveedores registrados!</h3>
			            @endif
        			</div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection