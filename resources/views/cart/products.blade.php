@extends('cart.layout')

@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">

                {{-- <img src="{{ $product->image }}" alt=""> --}}




                    <div class="card shadow mb-4">
                        <h4 class="m-0 font-weight-bold text-primary">{{ $product->title }}</h4>
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <p><strong>Preço: </strong> {{ $product->price }} AOA</p>
                        </div>
                        <div class="footer">

                        </div>
                    </div>

                    <p>{{ $product->description }}</p>

                    <p class="btn-holder "><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Adicionar ao carrinho <i class="fa fa-cart-plus"></i> </a> </p>

        </div>
    @endforeach
</div>

@endsection
