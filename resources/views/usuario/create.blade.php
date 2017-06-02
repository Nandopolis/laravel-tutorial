@extends('layouts.admin')

@section('content')
    @if(count($errors) > 0)
        <div class = "alert alert-danger alert-dismissible" role = "alert">
            <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"> 
                <span aria-hidden = "true"> 
                    &times;
                </span>
            </button>   
            <ul>
                @foreach($errors -> all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
    {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('Nombre:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre del usuario']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Correo:') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el correo del usuario']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Rol:') !!}
            {!! Form::text('role', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu rol']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Password:') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********']) !!}
        </div>

        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection