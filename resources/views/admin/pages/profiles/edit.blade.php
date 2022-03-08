@extends('adminlte::page')
@section('tite', "Editar Perfil {$profile->name}")

@section('content_header')

@stop

@section('content')

    <form action="{{route('profiles.update', $profile->id)}}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        @include('Admin.pages.profiles._partials.form')
    </form>



@stop


