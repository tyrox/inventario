@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Compra </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('facompras.store') }}">
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
                          <a class="btn btn-link pull-right" href="{{ route('facompras.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
