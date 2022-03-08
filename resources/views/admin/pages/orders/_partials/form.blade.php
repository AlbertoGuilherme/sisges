
@include('Admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{auth()->user()->name ?? ''}}" >
  </div>
    <div class="form-group">
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="quantity"  value="1" checked>
           1
          </label>

        </div>
    </div>
    <button class="btn btn-warning">Enviar</button>
