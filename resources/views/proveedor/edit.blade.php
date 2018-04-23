@extends('layouts.app')

@section('content')
    @include('error')
  <div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-edit"></i> Proveedor #{{$proveedor->id}}
    </div>
    <div class="panel-body">
      <div class="col-md-8 col-md-offset-2">
          <div class="col-md-12">
              <form action="{{ route('proveedors.update', $proveedor->id) }}" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Nombre</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ $proveedor->nombre }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                  </div>
                  <div class="form-group @if($errors->has('tel1')) has-error @endif">
                    <label for="tel1-field">Teléfono #1</label>
                    <input type="text" id="tel1-field" name="tel1" class="form-control" value="{{ $proveedor->telefono1 }}"/>
                     @if($errors->has("tel1"))
                      <span class="help-block">{{ $errors->first("tel1") }}</span>
                     @endif
                  </div>
                  <div class="form-group @if($errors->has('tel2')) has-error @endif">
                    <label for="tel2-field">Teléfono #2</label>
                    <input type="text" id="tel2-field" name="tel2" class="form-control" value="{{ $proveedor->telefono2 }}"/>
                     @if($errors->has("tel2"))
                      <span class="help-block">{{ $errors->first("tel2") }}</span>
                     @endif
                  </div>
                  <div class="form-group @if($errors->has('correo')) has-error @endif">
                    <label for="correo-field">Cédula</label>
                    <input type="text" id="correo-field" name="correo" class="form-control" value="{{ $proveedor->correo }}"/>
                     @if($errors->has("correo"))
                      <span class="help-block">{{ $errors->first("correo") }}</span>
                     @endif
                  </div>
                  <div class="form-group @if($errors->has('dir')) has-error @endif">
                    <label for="dir-field">Dirección</label>
                    <input type="text" id="dir-field" name="dir" class="form-control" value="{{ $proveedor->direccion }}"/>
                    @if($errors->has("dir"))
                    <span class="help-block">{{ $errors->first("dir") }}</span>
                     @endif
                  </div>
                  
                  <div class="form-group @if($errors->has('contacto')) has-error @endif">
                    <label for="contacto-field">Contacto</label>
                    <input type="text" id="contacto-field" name="contacto" class="form-control" value="{{ $proveedor->contacto }}"/>
                    @if($errors->has("contacto"))
                    <span class="help-block">{{ $errors->first("contacto") }}</span>
                     @endif
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
              <a class="btn btn-link pull-right" href="{{ route('proveedors.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

          </div>
      </div>
    </div>
  </div>
@endsection