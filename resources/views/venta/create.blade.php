@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Venta </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('faventas.store') }}">
                        {{ csrf_field() }}                        

                        <div class="form-group{{ $errors->has('cliente') ? ' has-error' : '' }}">
                            <label for="cliente" class="col-md-4 control-label">Cliente</label>

                            <div class="col-md-6">                                
                                <select name="cliente" class="custom-select custom-select-sm">
                                    @foreach($clientes as $cliente)
                                    <option name="cliente"value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('cliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fac') ? ' has-error' : '' }}">
                            <label for="fac" class="col-md-4 control-label">Facturación</label>

                            <div class="col-md-6">                                
                                <select name="fac" class="custom-select custom-select-sm">                                    
                                    <option name="fac"value="credito">Crédito</option>
                                    <option name="fac"value="contado">Contado</option>
                                </select>
                                @if ($errors->has('fac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>

                      <div class="well well-sm">                          
                          <a class="btn btn-link pull-right" href="{{ route('faventas.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
