@extends('layouts.app')
@section('header')
<div class="page-header panel-primary">
        <h3>Factura #{{$factura_compra->id}}</h3>
        <a class="btn  btn-primary" href="{{ route('facompras.show', $factura_compra->id) }}">
        Productos <i class="glyphicon glyphicon-shopping-cart"></i></a>
    </div>
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('facompras.update', $factura_compra->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                     <label for="code">Proveedor: {{$factura_compra->proveedor->nombre}}</label>
                </div>
                <div class="form-group">
                     <label for="descripcion">Monto de la factura: {{$factura_compra->monto_factura}}</label>                     
                </div>
                <div class="form-group">
                     <label for="descripcion">Monto de descuento: {{$factura_compra->monto_descuento}}</label>                     
                </div>
                <div class="form-group">
                     <label for="descripcion">Impuesto: {{$factura_compra->monto_impuesto}}</label>
                </div>
                <div class="form-group">
                     <label for="descripcion">Monto total: {{$factura_compra->monto_total}}</label>
                </div>
                <div class="form-group">
                     <label for="descripcion">Facturación: {{$factura_compra->facturacion}}</label>
                </div>
                <div class="form-group">
                     <label for="descripcion">Usuario: {{$factura_compra->user->name}}</label>
                </div>
                @if ($factura_compra->monto_total > 0)
                    <div class="panel-footer">
                         <label for="descripcion">Factura cerrada.</label>
                    </div>
                @else
                    <div class="form-group">
                         <label for="descripcion">Descuento:</label>
                         <input id="descuento" type="number" step="any" class="form-control" name="descuento" value="{{ old('descuento') }}" required autofocus>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Facturar <i class="glyphicon glyphicon-check"></i></button>
                @endif
            </form>


            <br>
            <a class="btn btn-link" href="{{ route('facompras.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
</div>
@endsection