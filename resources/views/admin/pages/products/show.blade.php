@extends('adminlte::page')
@section('title', "Detalhes do Produto {$product->name}")

@section('content_header')

@stop

@section('content')

<h1>Detalhes do Produto <b></b>{{$product->name}}</h1>
<div class="card">
 <div class="card-header">
    @include('Admin.includes.alerts')
     <hr>
 </div>
 <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>

                        <td>
                            <form action="{{route('products.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </form>
                        </td>
                    </tr>


                </tbody>
            </table>
 </div>

</div>
@stop


