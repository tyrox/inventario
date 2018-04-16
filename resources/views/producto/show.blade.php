@extends('layouts.app')
@section('header')
<div class="page-header">
        <h2>Sede #{{$sede->id}}</h2>
        <form action="{{ route('sedes.destroy', $sede->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('sedes.edit', $sede->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$sede->id}}</p>
                </div>
                <div class="form-group">
                     <label for="code">NOMBRE</label>
                     <p class="form-control-static">{{$sede->nombre}}</p>
                </div>
                <div class="form-group">
                     <label for="descripcion">DESCRIPTION</label>
                     <p class="form-control-static">{{$sede->descripcion}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('sedes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
</div>
@endsection