@extends('adminlte::page')
@section('title', 'Criar novo Usuario')

@section('content_header')

@stop

@section('content')

<h1>Criar Novo Usuario</h1>
<hr>
<div class="card">
    <div class="card-body">
        <form action="{{route('users.store')}}" method="post">
            @csrf
            @include('Admin.pages.users._partials.form')
        </form>
    </div>
</div>
@stop

