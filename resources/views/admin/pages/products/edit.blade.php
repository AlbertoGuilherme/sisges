@extends('adminlte::page')
@section('tite', "Editar Produto {$product->name}")

@section('content_header')

@stop

@section('content')

    <form action="{{route('products.update', $product->id)}}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        @include('Admin.pages.products._partials.form')
    </form>



@stop


