@extends('layouts.admin')

@section('content')
    {!! Form::model($user,['route' => ['usuario.update', $user -> id], 'method' => 'PUT']) !!}
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
            {!! Form::label('Password:') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********']) !!}
        </div>

        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['usuario.destroy', $user -> id], 'method' => 'DELETE']) !!}
    {{ csrf_field() }}
        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection