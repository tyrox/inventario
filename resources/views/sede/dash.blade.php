@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sedes
                	<a class="btn btn-xs btn-primary" href="{{ route('sedes.create') }}"><i class="glyphicon glyphicon-plus-sign"></i></a>
                </div>
                <div>
                	<div class="col-md-12">
            			@if($sedes->count())
                		<table class="table table-condensed table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Nombre</th>
		                        	<th>Descripción</th>
		                            <th class="text-right">OPTIONS</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($sedes as $sede)
		                            <tr>
		                                <td>{{$sede->id}}</td>
		                                <td>{{$sede->nombre}}</td>
		                    			<td>{{$sede->descripcion}}</td>                    			
		                                <td class="text-right">
		                                    <a class="btn btn-xs btn-primary" href="{{ route('sedes.show', $sede->id) }}"><i class="glyphicon glyphicon-zoom-in"></i></a>
		                                    <a class="btn btn-xs btn-warning" href="{{ route('sedes.edit', $sede->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
		                                    <form action="{{ route('sedes.destroy', $sede->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		                                        <input type="hidden" name="_method" value="DELETE">
		                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
		                                    </form>
		                                </td>
		                            </tr>
		                        @endforeach
		                    </tbody>
                		</table>
                		{!! $sedes->render() !!}
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