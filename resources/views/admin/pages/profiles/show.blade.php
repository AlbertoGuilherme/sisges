@extends('adminlte::page')
@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')

@stop

@section('content')

<h1>Detalhes do Plano <b></b>{{$profile->name}}</h1>
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
                        <td>{{$profile->id}}</td>
                        <td>{{$profile->name}}</td>

                        <td>
                            <form action="{{route('profiles.destroy', $profile->id)}}" method="post">
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


