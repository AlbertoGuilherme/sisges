@extends('adminlte::page')
@section('title', 'Fazer nova Reclamacao')

@section('content_header')

@stop

@section('content')

<h1>Fazer nova Reclamação</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('complains.store')}}" method="post">
            @csrf
            @include('Admin.pages.complains._partials.form')
        </form>
    </div>
</div>
@stop

