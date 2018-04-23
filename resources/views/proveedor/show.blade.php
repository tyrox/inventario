@extends('layouts.app')
@section('header')
<div class="page-header">
        <h2>Proveedor #{{$proveedor->id}}</h2>
        <form action="{{ route('proveedors.destroy', $proveedor->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('proveedors.edit', $proveedor->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$proveedor->nombre}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">TELÉFONO #1</label>
                     <p class="form-control-static">{{$proveedor->telefono1}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">TELÉFONO #2</label>
                     <p class="form-control-static">{{$proveedor->telefono2}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">CORREO</label>
                     <p class="form-control-static">{{$proveedor->correo}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">DIRECCIÓN #2</label>
                     <p class="form-control-static">{{$proveedor->direccion}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">CONTACTO</label>
                     <p class="form-control-static">{{$proveedor->contacto}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('proveedors.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
</div>
@endsection