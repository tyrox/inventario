@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Cliente </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('clientes.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ced') ? ' has-error' : '' }}">
                            <label for="ced" class="col-md-4 control-label">Cédula</label>

                            <div class="col-md-6">
                                <input id="ced" type="text" class="form-control" name="ced" value="{{ old('ced') }}" required autofocus>

                                @if ($errors->has('ced'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ced') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dir') ? ' has-error' : '' }}">
                            <label for="dir" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="dir" type="text" class="form-control" name="dir" value="{{ old('dir') }}" required autofocus>

                                @if ($errors->has('dir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel1') ? ' has-error' : '' }}">
                            <label for="tel1" class="col-md-4 control-label">Teléfono #1</label>

                            <div class="col-md-6">
                                <input id="tel1" type="text" class="form-control" name="tel1" value="{{ old('tel1') }}" required autofocus>

                                @if ($errors->has('tel1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel2') ? ' has-error' : '' }}">
                            <label for="tel2" class="col-md-4 control-label">Teléfono #2</label>

                            <div class="col-md-6">
                                <input id="tel2" type="text" class="form-control" name="tel2" value="{{ old('tel2') }}" required autofocus>

                                @if ($errors->has('tel2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel2') }}</strong>
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
                          <a class="btn btn-link pull-right" href="{{ route('clientes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
