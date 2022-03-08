
@include('Admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{$profile->name ?? ''}}" >
  </div>
    <div class="form-group">
      <label for="description">Descrição</label>
     <textarea name="description" id="" cols="20" rows="5" class="form-control"   >{{ $profile->description ?? ''}}</textarea>
    </div>
    <button class="btn btn-warning">Enviar</button>
