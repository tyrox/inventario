@extends('layouts.app')

@section('content')
    @include('error')
  <div class="container">
    
        <h3><i class="glyphicon glyphicon-edit"></i> Sede #{{$sede->id}}</h3>
    
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
          <div class="col-md-12">
              <form action="{{ route('sedes.update', $sede->id) }}" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group @if($errors->has('code')) has-error @endif">
                    <label for="code-field">Nombre</label>
                    <input type="text" id="code-field" name="name" class="form-control" value="{{ $sede->nombre }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                  </div>
                  <div class="form-group @if($errors->has('description')) has-error @endif">
                     <label for="description-field">Descripción</label>
                  <input type="text" id="description-field" name="description" class="form-control" value="{{ $sede->descripcion }}"/>
                     @if($errors->has("description"))
                      <span class="help-block">{{ $errors->first("description") }}</span>
                     @endif
                  </div>
                  <div class="well well-sm">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                      <a class="btn btn-link pull-right" href="{{ route('sedes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                  </div>
              </form>

          </div>
      </div>
    </div>
  </div>
@endsection