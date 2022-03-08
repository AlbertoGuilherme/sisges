@extends('adminlte::page')
@section('tite', "Editar Permissão {$permission->name}")

@section('content_header')

@stop

@section('content')

    <form action="{{route('permissions.update', $permission->id)}}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        @include('Admin.pages.permissions._partials.form')
    </form>



@stop


