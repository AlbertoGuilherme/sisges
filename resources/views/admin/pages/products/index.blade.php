@extends('adminlte::page')
@section('title', 'Pedidos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('products.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('products.index') }}">Perfis</a> </li>
</ol>

@stop

@section('content')

<h2>Bem vindo ao Marketplace</h2>
<p> Adicione produtos ao carrinho</p>
<hr>



<div class="card shadow mb-4">
    <div class="card-header">
     <h5 class="m-0 font-weight-bold text-primary"> Agora está mais fácil requisitar</h5>

    </div>
    <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem" src="{{url('imgs/aba.svg')}}" alt="" srcset="">
            </div>
    </div>
    <div class="card-footer">

    </div>
</div>

<div class="row">
    @foreach ($products as $product)
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
             <h5 class="m-0 font-weight-bold text-primary"> {{$product->title}}</h5>




            </div>
            <div class="card-body">

             <i class="fas fa-check"></i> Os dados do seu pedido serão gerados automaticamente pelo sistema
             <hr>
             <i class="fas fa-check"></i>Guarde o número do seu pedido
             <hr>
             <i class="fas fa-check"></i>Adicione ao carrinho quantos itens necessitar
     </div>
            <div class="card-footer">
                     {{-- <a href="{{route('products.create',$product->id)}}" class="btn btn-primary btn-icon-split">

                     </a> --}}

            </div>
        </div>
     </div>
@endforeach




   </div>

@stop


