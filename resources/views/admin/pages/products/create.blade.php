@extends('adminlte::page')
@section('tite', 'Criar novo Produto(Declaracao ou Certificado)')

@section('content_header')

@stop

@section('content')

<h1>Criar Novo Produto(Declaracao/Certificado)</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('products.store')}}" method="post">
            @csrf
            @include('Admin.pages.products._partials.form')
        </form>
    </div>
</div>
@stop

