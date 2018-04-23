@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Lo hacemos fácil</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Maneje eficientemente todos los productos de su empresa.
                    
                    <img src="http://ferretero.com/wp-content/uploads/2017/04/control-de-inventario-ABC-735x400.jpg" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
