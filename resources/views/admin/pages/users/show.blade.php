@extends('adminlte::page')
@section('title', "Detalhes do Usuário {$user->name}")

@section('content_header')

@stop

@section('content')

<h1>Detalhes do Usuário <b></b>{{$user->name}}</h1>
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
                        <th>Email</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="post">
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


