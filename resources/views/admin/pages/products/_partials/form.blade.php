
@include('Admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="title" class="form-control" value="{{$product->title ?? ''}}" >
  </div>
    <div class="form-group">
      <label for="description">Descrição</label>
     <textarea name="description" id="" cols="20" rows="5" class="form-control"   >{{ $product->description ?? ''}}</textarea>
    </div>
    <button class="btn btn-warning">Enviar</button>
