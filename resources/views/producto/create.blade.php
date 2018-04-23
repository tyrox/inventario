@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingresar producto </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('productos.store') }}">
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

                        <div class="form-group{{ $errors->has('descrip') ? ' has-error' : '' }}">
                            <label for="descrip" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <input id="descrip" type="text" class="form-control" name="descrip" value="{{ old('descrip') }}" required autofocus>

                                @if ($errors->has('descrip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descrip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                            <label for="departamento" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                <input id="departamento" type="text" class="form-control" name="departamento" value="{{ old('departamento') }}" required autofocus>

                                @if ($errors->has('departamento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departamento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('iv') ? ' has-error' : '' }}">
                            <label for="iv" class="col-md-4 control-label">IV</label>

                            <div class="col-md-6">
                                <input id="iv" type="number" class="form-control" name="iv" value="{{ old('iv') }}" required autofocus>

                                @if ($errors->has('iv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iv') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


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

                        <div class="form-group{{ $errors->has('prov2') ? ' has-error' : '' }}">
                            <label for="prov2" class="col-md-4 control-label">Proveedor</label>

                            <div class="col-md-6">                                
                                <select name="prov2" class="custom-select custom-select-sm">
                                    @foreach($proveedors as $proveedor)
                                    <option name="prov2"value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('prov2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prov2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="col-md-4 control-label">Precio costo</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" step="any" class="form-control" name="precio" value="{{ old('precio') }}" required autofocus>

                                @if ($errors->has('precio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('precio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('publico') ? ' has-error' : '' }}">
                            <label for="publico" class="col-md-4 control-label">Precio público</label>

                            <div class="col-md-6">
                                <input id="publico" type="number" step="any" class="form-control" name="publico" value="{{ old('publico') }}" required autofocus>

                                @if ($errors->has('publico'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publico') }}</strong>
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
                          <a class="btn btn-link pull-right" href="{{ route('productos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
