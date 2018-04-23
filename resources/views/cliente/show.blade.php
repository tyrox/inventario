@extends('layouts.app')
@section('header')
<div class="page-header panel-primary">
        <h3>Cliente #{{$cliente->id}}</h3>
        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('clientes.edit', $cliente->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                
                <div class="form-group">
                     <label for="code">NOMBRE</label>
                     <p class="form-control-static">{{$cliente->nombre}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">CÉDULA</label>
                     <p class="form-control-static">{{$cliente->cedula}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">DIRECCIÓN</label>
                     <p class="form-control-static">{{$cliente->direccion}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">TELÉFONO #1</label>
                     <p class="form-control-static">{{$cliente->telefono1}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">TELÉFONO #2</label>
                     <p class="form-control-static">{{$cliente->telefono2}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">FACTURACIÓN</label>
                     <p class="form-control-static">{{$cliente->facturacion}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('clientes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
</div>
@endsection