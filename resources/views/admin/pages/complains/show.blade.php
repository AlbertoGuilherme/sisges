@extends('adminlte::page')
@section('title', "Detalhes do Pedido {$complain->name}")

@section('content_header')

@stop

@section('content')

<h1>Detalhes da reclamação <b></b>{{$complain->name}}</h1>
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
                        <th style="width=30px;"> Dono Reclamação</th>
                        <th>status</th>
                        @admin
                        <th>Apagar/Mudar Estado</th>
                            @endadmin


                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$complain->identify}}</td>
                        <td>{{$complain->own_name}}</td>
                        <td>{{$complain->status }}</td>
                        @admin
                        <td>
                            <form action="{{route('complains.destroy', $complain->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </form>
                        </td>
                        <td >
                            <form action="{{route('complains.update', $complain->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <label for="process">

                                    <input type="submit" name="status" value="processando" class="btn btn-info">
                                </label>

                            </form>

                        </td>
                        <td>
                            <form action="{{route('complains.update', $complain->id)}}" method="post">
                                @csrf
                                @method('PUT')

                                    <input type="submit" name="status" value="concluído" class="btn btn-success">

                            </form>
                        </td>
                            @endadmin

                    </tr>


                </tbody>
            </table>
 </div>

</div>
@stop


