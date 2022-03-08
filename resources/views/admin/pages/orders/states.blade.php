@extends('adminlte::page')
@section('title', 'Pedidos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('orders.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('orders.index') }}">Pedidos</a> </li>
</ol>

@stop

@section('content')
        <h1 class = "m-0 font-weight-bold text-primary">Suas Notificações</h1>
        @admin
        <h2 class = "m-0 font-weight-bold text-primary">Administrador, tem pedidos/reclamações Pendentes </h2>
        @endadmin
<div class="card shadow">
    <div class="card-header">
        @include('Admin.includes.alerts')
       
    </div>

    <div class="card-body">
        <table class="table table-striped">
     @admin
            <thead>
                <tr>

                        <th>Número Único de Solicitação </th>
                        <th>Dono do Pedido</th>
                        <th> Pedido</th>
                        <th>RUPE do Pedido</th>
                        <th>Estado do Pedido</th>
            
                        
                        <th width="300">Alterar estado</th>
                    @endadmin
                </tr>

                </tr>
            </thead>
            
            <tbody>
            @admin
                @foreach ($ordersOpen as $orderOpen)
                <tr>
                    <td>{{$orderOpen->identify}}</td>
                    <td>{{$orderOpen->own_name}}</td>
                    <td>{{$orderOpen->comment}}</td>
                    <td>{{$orderOpen->reup}}</td>
                    @if ($orderOpen->status == 'aberto')
                    <td><button class="btn btn-outline-warning">{{$orderOpen->status}}</button></td>


 @endif
                    <td style="width=10px;" >
                        {{-- <a href="{{ route('details.order.index', $order->url )}}" class="btn btn-warning">Detalhes</a> --}}
                        <a href="{{ route('orders.index' )}}" class="btn btn-warning">Mudar Estado</a>
                        {{-- <a href="{{ route('orders.products', $orderAd->id )}}" class="btn btn-warning"> <i class="fas fa-address-book"></i> </a> --}}


                    </td>



                </tr>
                @endforeach
                @endadmin
                @user
                     <thead>
                    <h1>O estado da sua reclamação/Pedido foi alterado(a)</h1>
                <tr>

                        <th>Número da reclamação </th>
                        <th>Título</th>
                        <th>Estado da Reclamação</th>

                    @enduser
                        @admin
                        <th width="300">Alterar estado</th>
                    @endadmin
                </tr>

                </tr>
            </thead>

                @foreach ($complainUser as $complainUs)
                <tr>
                    <td>{{$complainUs->identify}}</td>
                    <td>{{$complainUs->name}}</td>
                    @if ($complainUs->status == 'processando')
                    <td><button class="btn btn-outline-info">{{$complainUs->status}}</button></td>


 @endif
                    <td style="width=10px;" >
                        {{-- <a href="{{ route('details.order.index', $order->url )}}" class="btn btn-info">Detalhes</a> --}}
                        
                        {{-- <a href="{{ route('orders.products', $orderAd->id )}}" class="btn btn-warning"> <i class="fas fa-address-book"></i> </a> --}}


                    </td>



                </tr>
                @endforeach
                @user
        <thead>
        
                        <th>Número Único de Solicitação </th>
                        <th> Pedido</th>
                        <th>Estado do Pedido</th>

                        @foreach ($ordersUser as $orderUser)
                <tr>
                    <td>{{$orderUser->identify}}</td>
                    <td>{{$orderUser->comment}}</td>
                    @if ($orderUser->status == 'processando')
                    <td><button class="btn btn-outline-info">{{$orderUser->status}}</button></td>
                @endif

                </tr>
                @endforeach
                @enduser
        </thead>
            
            </tbody>
        
        </table>

        <div class="card-footer">

        @if (isset($filters))
             {!!$ordersOpen->appends($filters)->links()!!}
        @else
             {!!$ordersOpen->links()!!}
        @endif
    </div>
    </div>


@stop


