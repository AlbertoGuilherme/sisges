@extends('adminlte::page')
@section('title', "Detalhes da Permissão {$permission->name}")

@section('content_header')

@stop

@section('content')

<h1>Detalhes do Plano <b></b>{{$permission->name}}</h1>
<div class="card">
 <div class="card-header">
    @include('Admin.includes.alerts')
     <hr>
 </div>
 <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>

                        <td>
                            <form action="{{route('permissions.destroy', $permission->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </form>
                        </td>
                    </tr>


                </tbody>
            </table>
 </div>

</div>
@stop


