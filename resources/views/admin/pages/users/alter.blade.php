@extends('adminlte::page')
@section('tite', "Editar Usuário {$user->name}")

@section('content_header')

@stop

@section('content')

    <form action="{{route('users.update', $user->id)}}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        @include('Admin.pages.users._partials.form')
    </form>



@stop

