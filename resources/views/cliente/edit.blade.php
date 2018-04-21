@extends('layouts.app')

@section('content')
    @include('error')
  <div class="container">
    
        <h3><i class="glyphicon glyphicon-edit"></i> Cliente #{{$cliente->id}}</h3>
    
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
          <div class="col-md-12">
              <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Nombre</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ $cliente->nombre }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                  </div>
                  <div class="form-group @if($errors->has('ced')) has-error @endif">
                     <label for="ced-field">Cédula</label>
                  <input type="text" id="ced-field" name="ced" class="form-control" value="{{ $cliente->cedula }}"/>
                     @if($errors->has("ced"))
                      <span class="help-block">{{ $errors->first("ced") }}</span>
                     @endif
                  </div>
                  <div class="form-group @if($errors->has('dir')) has-error @endif">
                     <label for="dir-field">Dirección</label>
                  <input type="text" id="dir-field" name="dir" class="form-control" value="{{ $cliente->direccion }}"/>
                     @if($errors->has("dir"))
                      <span class="help-block">{{ $errors->first("dir") }}</span>
                     @endif
                  </div>
                  <div class="form-group @if($errors->has('tel1')) has-error @endif">
                     <label for="tel1-field">Teléfono #1</label>
                  <input type="text" id="tel1-field" name="tel1" class="form-control" value="{{ $cliente->telefono1 }}"/>
                     @if($errors->has("tel1"))
                      <span class="help-block">{{ $errors->first("tel1") }}</span>
                     @endif
                  </div>
                  <div class="form-group @if($errors->has('tel2')) has-error @endif">
                     <label for="tel2-field">Teléfono #2</label>
                  <input type="text" id="tel2-field" name="tel2" class="form-control" value="{{ $cliente->telefono2 }}"/>
                     @if($errors->has("tel2"))
                      <span class="help-block">{{ $errors->first("tel2") }}</span>
                     @endif
                  </div>
                  <div class="form-group{{ $errors->has('fac') ? ' has-error' : '' }}">
                            <label for="fac" class="col-md-2 control-label">Facturación</label>

                            <div class="col-md-6">                                
                                <select name="fac" class="custom-select custom-select-sm">                                    
                                    <option name="1"value="contado">Contado</option>
                                    <option name="2"value="credito">Crédito</option>
                                </select>
                                @if ($errors->has('fac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fac') }}</strong>
                                    </span>
                                @endif
                            </div>
                  </div>
                  <div class="well well-sm">
                      <br>
                      

                  </div>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
              <a class="btn btn-link pull-right" href="{{ route('clientes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

          </div>
      </div>
    </div>
  </div>
@endsection