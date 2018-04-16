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

                  <div class="form-group @if($errors->has('code')) has-error @endif">
                    <label for="code-field">Nombre</label>
                    <input type="text" id="code-field" name="nombre" class="form-control" value="{{ $producto->nombre }}"/>
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

                  <div class="form-group @if($errors->has('cantidad')) has-error @endif">
                     <label for="cantidad-field">Cantidad</label>
                  <input type="text" id="cantidad-field" name="cantidad" class="form-control" value="{{ $producto->cantidad }}"/>
                     @if($errors->has("cantidad"))
                      <span class="help-block">{{ $errors->first("cantidad") }}</span>
                     @endif
                  </div>

                  <div class="form-group{{ $errors->has('sede') ? ' has-error' : '' }}">
                      <label for="sede" class="col-md-4 control-label">Sede</label>
                      <div class="col-md-6">
                        <!-- <input id="sede" type="text" class="form-control" name="sede" value="{{ old('sede') }}" required autofocus> -->
                        <select name="sede" class="custom-select custom-select-sm">
                            @foreach($sedes as $sede)
                            <option name="cant"value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('sede'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sede') }}</strong>
                            </span>
                        @endif
                      </div>
                  </div>

                  <div class="form-group @if($errors->has('code')) has-error @endif">
                    <label for="code-field">Precio</label>
                    <input type="text" id="code-field" name="precio" class="form-control" value="{{ $producto->precio }}"/>
                       @if($errors->has("precio"))
                        <span class="help-block">{{ $errors->first("precio") }}</span>
                       @endif
                  </div>

                  <div class="well well-sm">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                      <a class="btn btn-link pull-right" href="{{ route('productos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                  </div>
              </form>

          </div>
      </div>
    </div>
  </div>
@endsection