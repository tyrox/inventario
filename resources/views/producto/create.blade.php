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

                        <div class="form-group{{ $errors->has('cant') ? ' has-error' : '' }}">
                            <label for="cant" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cant" type="text" class="form-control" name="cant" value="{{ old('cant') }}" required autofocus>

                                @if ($errors->has('cant'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('sede') ? ' has-error' : '' }}">
                            <label for="sede" class="col-md-4 control-label">Sede</label>

                            <div class="col-md-6">
                                <!-- <input id="sede" type="text" class="form-control" name="sede" value="{{ old('sede') }}" required autofocus> -->
                                <select class="custom-select custom-select-sm">
                                    @foreach($sedes as $sede)
                                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sede'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sede') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="col-md-4 control-label">Precio</label>

                            <div class="col-md-6">
                                <input id="precio" type="text" class="form-control" name="precio" value="{{ old('precio') }}" required autofocus>

                                @if ($errors->has('precio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('precio') }}</strong>
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
