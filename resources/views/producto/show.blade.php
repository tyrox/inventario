@extends('layouts.app')
@section('header')
<div class="page-header">
        <h2>Producto #{{$producto->id}}</h2>
        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('productos.edit', $producto->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$producto->nombre}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">DESCRIPTION</label>
                     <p class="form-control-static">{{$producto->descripcion}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">DEPARTAMENTO</label>
                     <p class="form-control-static">{{$producto->departamento}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">IV</label>
                     <p class="form-control-static">{{$producto->iv}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">PROVEEDOR #1</label>
                     <p class="form-control-static">{{$producto->proveedor1}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">PROVEEDOR #2</label>
                     <p class="form-control-static">{{$producto->proveedor2}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">PRECIO COSTO</label>
                     <p class="form-control-static">{{$producto->precio_costo}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">PRECIO PÚBLICO</label>
                     <p class="form-control-static">{{$producto->precio_publico}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">EXISTENCIA</label>
                     <p class="form-control-static">{{$producto->existencia}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('productos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
</div>
@endsection