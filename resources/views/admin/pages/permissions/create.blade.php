@extends('adminlte::page')
@section('tite', 'Criar nova Permissão')

@section('content_header')

@stop

@section('content')

<h1>Criar nova Permissão</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('permissions.store')}}" method="post">
            @csrf
            @include('Admin.pages.permissions._partials.form')
        </form>
    </div>
</div>
@stop

