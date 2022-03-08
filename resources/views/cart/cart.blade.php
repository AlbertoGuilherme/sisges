@extends('cart.layout')

@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Produto</th>
            <th style="width:10%">Preço</th>
            <th style="width:8%">Quantidade</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp

                <tr data-id="{{ $id }}">
                    {{-- <h4 class="nomargin">{{ $details['name'] }}</h4> --}}
                    <td data-th="Produto">
                        <div class="row">
                                {{$details['name']}}

                            {{-- <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div> --}}
                            <div class="col-sm-9">

                            </div>
                        </div>
                    </td>
                    <td data-th="Preço">${{ $details['price'] }}</td>
                    <td data-th="Quantidade">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">AOA{{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total AOA{{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/buy') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Continuar a Comprar</a>
                <button class="btn btn-success">Checkout</button>



            </td>
        </tr>
    </tfoot>
</table>


                                     {{-- MODAL --}}
<!-- Button trigger modal -->
{{-- Preço : <h4 class="m-0 font-weight-bold text-primary">  {{$product->price}} AOA</h4> --}}
<button type="button" class="btn btn-warning btn-block text-center" data-toggle="modal" data-target="#exampleModal">
    {{-- Adicionar ao carrinho <i class="fas fa-cart-arrow-down"></i> --}}
    Finalizar a compra
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Resumo do Seu Pedido</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{route('products.orders.attach', $details['id'])}}" method="post">
            @csrf
        <div class="modal-body">

           <p> <strong>Nome</strong> :  {{auth()->user()->name}}</p>
           <input type="hidden" name="name_user" value="{{auth()->user()->name}}">

          <p>  <strong>Numero do Sigu :</strong>  {{auth()->user()->sigu}}</p>
          <input type="hidden" name="sigu" value="{{auth()->user()->sigu}}">

          <p> <strong>Tipo:</strong>  @foreach(session('cart') as $id => $details)
                                         {{$details['name']}}({{$details['quantity']}}),

                                                      @endforeach
          </p>

          <input type="hidden" name="name" value="@foreach(session('cart') as $id => $details)
          {{$details['name']}}({{$details['quantity']}}),@endforeach">

          <p>Valor a pagar :{{ number_format($total, 2 , ',', '.')}} AOA</p>
          <input type="hidden" name="total" value="{{$total}}">
          <div class="form-group">
            <label for="reup">Insira o REUP do seu pagamento por referência</label>
            <input type="text" name="reup" class="form-control">
          </div>


          {{-- @foreach ($products->products as $product)
              <p>Nome do Documento : {{$product->title}}</p>
          @endforeach --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
     <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- Modal end --}}
@endsection

@section('scripts')
<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Tem certeza que pretende remover o produto?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
