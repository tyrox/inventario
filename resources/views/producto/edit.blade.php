@extends('layouts.app')

@section('content')
    @include('error')
  <div class="container">
    
        <h3><i class="glyphicon glyphicon-edit"></i> Producto #{{$producto->id}}</h3>
    
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
          <div class="col-md-12">
              <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group @if($errors->has('nombre')) has-error @endif">
                    <label for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ $producto->nombre }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                  </div>

                  <div class="form-group @if($errors->has('description')) has-error @endif">
                    <label for="description-field">Descripción</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ $producto->descripcion }}"/>
                     @if($errors->has("description"))
                      <span class="help-block">{{ $errors->first("description") }}</span>
                     @endif
                  </div>

                  <div class="form-group @if($errors->has('departamento')) has-error @endif">
                    <label for="departamento-field">Departamento</label>
                    <input type="text" id="departamento-field" name="departamento" class="form-control" value="{{ $producto->departamento }}"/>
                     @if($errors->has("departamento"))
                      <span class="help-block">{{ $errors->first("departamento") }}</span>
                     @endif
                  </div>

                  <div class="form-group @if($errors->has('iv')) has-error @endif">
                    <label for="iv-field">IV</label>
                    <input type="number" step="any" id="iv-field" name="iv" class="form-control" value="{{ $producto->iv }}"/>
                     @if($errors->has("iv"))
                      <span class="help-block">{{ $errors->first("iv") }}</span>
                     @endif
                  </div>
                  <div class="well well-sm">
                    <div class="form-group{{ $errors->has('prov1') ? ' has-error' : '' }}">
                        <label for="prov1" class="col-md-3 control-label">Proveedor #1</label>
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
                  </div>

                  <div class="well well-sm">
                    <div class="form-group{{ $errors->has('prov2') ? ' has-error' : '' }}">
                        <label for="prov2" class="col-md-3 control-label">Proveedor #2</label>
                        <div class="col-md-6">                      
                          <select name="prov2" class="custom-select custom-select-sm">
                              @foreach($proveedors as $proveedors)
                              <option name="cant"value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                              @endforeach
                          </select>
                          @if ($errors->has('prov2'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('prov2') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                  </div>

                  <div class="form-group @if($errors->has('precio')) has-error @endif">
                    <label for="precio-field">Precio costo</label>
                    <input type="number" step="any" id="precio-field" name="precio" class="form-control" value="{{ $producto->precio_costo }}"/>
                       @if($errors->has("precio"))
                        <span class="help-block">{{ $errors->first("precio") }}</span>
                       @endif
                  </div>

                  <div class="form-group @if($errors->has('publico')) has-error @endif">
                    <label for="publico-field">Precio público</label>
                    <input type="number" step="any" id="publico-field" name="publico" class="form-control" value="{{ $producto->precio_publico }}"/>
                       @if($errors->has("publico"))
                        <span class="help-block">{{ $errors->first("publico") }}</span>
                       @endif
                  </div>

                  <div class="form-group @if($errors->has('existencia')) has-error @endif">
                    <label for="existencia-field">Existencias</label>
                    <input type="number" id="existencia-field" name="existencia" class="form-control" value="{{ $producto->existencia }}"/>
                       @if($errors->has("existencia"))
                        <span class="help-block">{{ $errors->first("existencia") }}</span>
                       @endif
                  </div>

                  <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
              <a class="btn btn-link pull-right" href="{{ route('productos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
          </div>
      </div>
    </div>
  </div>
@endsection