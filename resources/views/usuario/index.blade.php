@extends('layouts.admin')

<?php $message = Session::get('message') ?>

@if(Session::has('message'))
    <div class = "alert alert-success alert-dismissible" role = "alert">
        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"> 
            <span aria-hidden = "true"> 
                &times;
            </span>
        </button>
        {{ Session::get('message') }}
    </div>
@endif

@section('content')
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Roles</th>
            <th>Operaciones</th>
        </thead>
        @foreach ($users as $user)
        <tbody>
            <td>{{ $user -> name }}</td>
            <td>{{ $user -> email }}</td>
            <td>
                @foreach (($user -> roles) as $role)
                    {{ $role -> name }},
                @endforeach
            </td>
            <td>
                {!! link_to_route('usuario.edit', $title = 'Editar', $parameters = $user -> id, $attributes = ['class' => 'btn btn-primary']); !!}
            </td>
        </tbody>
        @endforeach
    </table>

@endsection