@extends('adminlte::page')
@section('tite', 'Criar novo Perfil')

@section('content_header')

@stop

@section('content')

<h1>Criar Novo Perfil</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('profiles.store')}}" method="post">
            @csrf
            @include('Admin.pages.profiles._partials.form')
        </form>
    </div>
</div>
@stop

