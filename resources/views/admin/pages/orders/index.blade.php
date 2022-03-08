@extends('adminlte::page')
@section('title', 'Pedidos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('orders.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('orders.index') }}">Pedidos</a> </li>
</ol>

@stop

@section('content')

<div class="card shadow">
    <div class="card-header">
        @include('Admin.includes.alerts')
       <form action="{{ route('orders.search') }}" method="post" class="form form-inline">
           @csrf
           <input type="text" name="filter"  class="form-control" placeholder="Name" value ="{{$filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-warning">Pesquisar</button>
       </form>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>

                        <th>Número Único de Solicitação </th>
                        <th>Dono do Pedido</th>
                        <th> Pedido</th>
                        <th>REUP do Pedido</th>
                        <th>Estado do Pedido</th>
                        @admin
                        <th width="300">Accoes</th>
                    @endadmin
                </tr>

                </tr>
            </thead>
            @admin
            <tbody>
                @foreach ($ordersAd as $orderAd)
                <tr>
                    <td>{{$orderAd->identify}}</td>
                    <td>{{$orderAd->own_name}}</td>
                    <td>{{$orderAd->comment}}</td>
                    <td>{{$orderAd->reup}}</td>
                    @if ($orderAd->status == 'aberto')
                    <td><button class="btn btn-outline-warning">{{$orderAd->status}}</button></td>

                    @elseif($orderAd->status == 'processando')
                    <td><button class="btn btn-outline-info">{{$orderAd->status}}</button></td>

                    @elseif($orderAd->status == 'completo')
                    <td><button class="btn btn-outline-success">{{$orderAd->status}}</button></td>
                @endif


                    <td style="width=10px;" >
                        {{-- <a href="{{ route('details.order.index', $order->url )}}" class="btn btn-info">Detalhes</a> --}}

                        <a href="{{ route('orders.show', $orderAd->id )}}" class="btn btn-warning">Detalhes <i class="fas fa-eye"></i></a>
                        {{-- <a href="{{ route('orders.products', $orderAd->id )}}" class="btn btn-warning"> <i class="fas fa-address-book"></i> </a> --}}


                    </td>



                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
{{-- Se o usuario nao for admin mostra o seguinte --}}
    @else

    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->identify}}</td>
            <td>{{$order->own_name}}</td>
            <td>{{$order->comment}}</td>
            <td>{{$order->reup}}</td>
            @if ($order->status == 'aberto')
            <td><button class="btn btn-outline-warning">{{$order->status}}</button></td>

            @elseif($order->status == 'processando')
            <td><button class="btn btn-outline-info">{{$order->status}}</button></td>

            @elseif($order->status == 'concluído')
            <td><button class="btn btn-outline-success">{{$order->status}}</button></td>
        @endif



            <td style="width=10px;" >
                {{-- <a href="{{ route('details.order.index', $order->url )}}" class="btn btn-info">Detalhes</a> --}}

                <a href="{{ route('orders.show', $order->id )}}" class="btn btn-warning"><i class="fas fa-lock"></i> </a>
                {{-- <a href="{{ route('orders.products', $order->id )}}" class="btn btn-warning"> <i class="fas fa-address-book"></i> </a> --}}


            </td>



        </tr>
        @endforeach
    </tbody>

</table>
</div>

    <div class="card-footer">

    </div>
</div>
@endadmin

    {{-- SVG de permissoes --}}
<div class="card shadow mb-4">
    <div class="card-header">
     <h5 class="m-0 font-weight-bold text-primary">Aqui tem acesso a todos os Solicitaçãos do sistema e pode alterar os estados
     </h5>


    </div>
    <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem" src="{{url('imgs/order.svg')}}" alt="" srcset="">
            </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-warning">Tenha cuidado ao alterar os estados dos Solicitaçãos</button>
    </div>
</div>



@stop


