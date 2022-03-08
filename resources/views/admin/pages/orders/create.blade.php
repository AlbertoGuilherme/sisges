@extends('adminlte::page')
@section('title', 'Fazer novo Pedido')

@section('content_header')

@stop

@section('content')

<h1>Fazer novo pedido</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('orders.store')}}" method="post">
            @csrf
            @include('Admin.pages.orders._partials.form')
        </form>
    </div>
</div>
@stop

