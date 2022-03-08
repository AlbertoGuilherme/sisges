@extends('adminlte::page')
@section('title', "Detalhes da Solicitação {$order->name}")

@section('content_header')

@stop

@section('content')

<h1>Detalhes da Solicitação <b></b>{{$order->name}}</h1>
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
                        <th style="width=30px;"> Dono </th>
                        <th>status</th>
                        @admin
                        <th>Apagar/Mudar Estado</th>
                            @endadmin


                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$order->identify}}</td>
                        <td>{{$order->own_name}}</td>
                        <td>{{$order->status }}</td>
                        @admin
                        <td>
                            <form action="{{route('orders.destroy', $order->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </form>
                        </td>
                        <td >
                            <form action="{{route('orders.update', $order->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <label for="process">

                                    <input type="submit" name="status" value="processando" class="btn btn-info">
                                </label>

                            </form>

                        </td>
                        <td>
                            <form action="{{route('orders.update', $order->id)}}" method="post">
                                @csrf
                                @method('PUT')

                                    <input type="submit" name="status" value="completo" class="btn btn-success">

                            </form>
                        </td>
                            @endadmin

                    </tr>


                </tbody>
            </table>
 </div>

</div>
@stop


