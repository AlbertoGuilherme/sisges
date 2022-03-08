
@include('Admin.includes.alerts')
<div class="form-group">
    <label for="name">Sobre que é a Reclamação</label>
    <input type="text" name="name" class="form-control" placeholder="Escreva um titulo para sua reclamação" value="{{$complain->name ?? ''}}">
  </div>
    <div class="form-group">
        <textarea name="comment" id="" cols="30" rows="10" class="form-control" placeholder="Descreva a sua reclamação"> {{$complain->comment ?? ''}}</textarea>

        </div>
    </div>
    <button class="btn btn-warning">Enviar</button>
