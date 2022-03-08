@extends('adminlte::page')
@section('title', 'Reclamacoes')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('complains.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('complains.index') }}">Reclamações</a> </li>
</ol>

@stop

@section('content')

<p>Fazer nova Reclamação <a href="{{route('complains.create')}}" class="btn btn-dark">Nova</a></p>
    {{-- SVG de permissoes --}}
    <div class="card shadow mb-4">
        <div class="card-header">
         <h5 class="m-0 font-weight-bold text-primary">Aqui tem acesso a todas as suas reclamações no sistema
         </h5>
    </div>

<div class="card shadow">
    <div class="card-header">
        @include('Admin.includes.alerts')
       <form action="{{ route('complains.search') }}" method="post" class="form form-inline">
           @csrf
           <input type="text" name="filter"  class="form-control" placeholder="Name" value ="{{$filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-warning">Pesquisar</button>
       </form>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>

                        <th>Número de Reclamacao</th>
                        <th>Titulo da Reclamação</th>
                        <th>Dono da Reclamação</th>

                        <th>Estado do Pedido</th>
                        @admin
                        <th width="300">Accoes</th>
                    @endadmin
                </tr>
            </thead>
            @admin
            <tbody>
                @foreach ($complainsAd as $complainAd)
                <tr>
                    <td>{{$complainAd->identify}}</td>
                    <td>{{$complainAd->name}}</td>
                    <td>{{$complainAd->own_name}}</td>
                    @if ($complainAd->status == 'aberto')
                <td><button class="btn btn-outline-warning">{{$complainAd->status}}</button></td>

                    @elseif($complainAd->status == 'processando')
                    <td><button class="btn btn-outline-info">{{$complainAd->status}}</button></td>

                    @elseif($complainAd->status == 'concluído')
                    <td><button class="btn btn-outline-success">{{$complainAd->status}}</button></td>
            @endif

                    <td style="width=10px;" >
                        {{-- <a href="{{ route('details.order.index', $order->url )}}" class="btn btn-info">Detalhes</a> --}}

                        <a href="{{ route('complains.show', $complainAd->id )}}" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                        {{-- <a href="{{ route('complains.products', $complainAd->id )}}" class="btn btn-warning"> <i class="fas fa-address-book"></i> </a> --}}


                    </td>



                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
{{-- Se o usuario nao for admin mostra o seguinte --}}
    @else

    <tbody>
        @foreach ($complains as $complain)
        <tr>
            <td>{{$complain->identify}}</td>
            <td>{{$complain->name}}</td>
            <td>{{$complain->own_name}}</td>
            @if ($complain->status == 'aberto')
                <td><button class="btn btn-outline-warning">{{$complain->status}}</button></td>

                @elseif($complain->status == 'processando')
                <td><button class="btn btn-outline-info">{{$complain->status}}</button></td>

                @elseif($complain->status == 'concluído')
                <td><button class="btn btn-outline-success">{{$complain->status}}</button></td>
            @endif



            <td style="width=10px;" >
                {{-- <a href="{{ route('details.complain.index', $complain->url )}}" class="btn btn-info">Detalhes</a> --}}
                <a href="{{ route('complains.edit', $complain->id )}}" class="btn btn-success">edit</a>
                <a href="{{ route('complains.show', $complain->id )}}" class="btn btn-warning">Ver</a>
                {{-- <a href="{{ route('complains.pr-oducts', $complain->id )}}" class="btn btn-warning"> <i class="fas fa-address-book"></i> </a> --}}


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

    <div class="card-footer">
        <button class="btn btn-warning">Tenha cuidado ao alterar os estados dos pedidos</button>
    </div>
</div>


@stop


