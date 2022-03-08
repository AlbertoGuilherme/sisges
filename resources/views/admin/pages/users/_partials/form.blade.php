@include('Admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{$user->name ?? ''}}" >
  </div>
  <div class="form-group">
    <label for="sigu">Sigu</label>
    <input type="number" name="sigu" class="form-control" value="{{$user->sigu ?? ''}}" >
  </div>
  <div class="form-group">
    <label for="name">Email</label>
    <input type="email" name="email" class="form-control" value="{{$user->email ?? ''}}" >
  </div>

  <div class="form-group">
    <label for="password">Senha</label>
    <input type="password" name="password" class="form-control"  >
  </div>


    <button class="btn btn-info">Enviar</button>
