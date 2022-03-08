@extends('adminlte::page')
@section('title', 'Usuários')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('users.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('users.index') }}">Usuários</a> </li>
</ol>

@stop

@section('content')

<p>Criar novo Usuário <a href="{{route('users.create')}}" class="btn btn-dark">Novo</a></p>
<hr>
@include('Admin.includes.alerts')

        <div class="card shadow">
            <div class="card-header">
               <form action="{{ route('users.search') }}" method="post" class="form form-inline">
                   @csrf
                   <input type="text" name="filter"  class="form-control" placeholder="Name" value ="{{$filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-warning">pesquisar</button>
               </form>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>

                                <th>Nome</th>

                                <th width="300">Accoes</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>

                            <td style="width=10px;" >
                                {{-- <a href="{{ route('details.user.index', $user->url )}}" class="btn btn-info">Detalhes</a> --}}
                                <a href="{{ route('users.edit', $user->id )}}" class="btn btn-success">edit</a>
                                <a href="{{ route('users.show', $user->id )}}" class="btn btn-warning">Ver</a>
                                {{-- <a href="{{ route('users.permissions',  $user->id)}}" class="btn btn-warning"><i class="fas fa-lock"></i></a> --}}
                                {{-- <a href="{{ route('users.plans',  $user->id)}}" class="btn btn-warning"><i class="fas fa-list"></i></a> --}}


                            </td>



                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">

                @if (isset($filters))
                     {!!$users->appends($filters)->links()!!}
                @else
                     {!!$users->links()!!}
                @endif
            </div>
        </div>
@stop


