@extends('layouts.app')
@section('header')
<div class="page-header">
        <h3>Factura #{{$factura_compra->id}}</h3>
        <form action="{{ route('facompras.destroy', $factura_compra->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('facompras.edit', $factura_compra->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
            </form>
            <form class="form-horizontal" method="POST" action="{{ route('decompras.store') }}">
                        {{ csrf_field() }}
                <div class="form-group{{ $errors->has('prov1') ? ' has-error' : '' }}">
                    <label for="prov1" class="col-md-4 control-label">Proveedor</label>
                    <div class="col-md-6">                                
                        <select name="prov1" class="custom-select custom-select-sm">
                            @foreach($proveedors as $proveedor)
                            <option name="prov1"value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('prov1'))
                            <span class="help-block">
                                <strong>{{ $errors->first('prov1') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </form>
            <br>
            <a class="btn btn-link" href="{{ route('facompras.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
</div>
@endsection