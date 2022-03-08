@extends('adminlte::page')
@section('title', "Permissoes do perfil{$profile->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('profiles.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('profiles.index') }}">Perfis</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('profiles.permissions', $profile->id) }}">Permissões do Perfil</a> </li>
</ol>

@stop

@section('content')

<h1>Permissões do perfi l{{$profile->name}}</h1>
    <a href="{{route('profiles.permissions.avalaible', $profile->id)}}" class="btn btn-dark">Novo</a>


        <div class="card">
            <div class="card-header">
                @include('Admin.includes.alerts')
               <form action="{{ route('profiles.permissions.avalaible', $profile->id) }}" method="post" class="form form-inline">
                   @csrf
                   <input type="text" name="filter"  class="form-control" placeholder="Name" value ="{{$filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-warning">pesquisar</button>
               </form>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                                <th>Nome</th>

                                <th width="300">Accoes</th>

                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('profiles.permissions.attach', $profile->id)}}" method="post">
                                    @foreach ($permissions as $permission)
                                    <tr>

                                            @csrf
                                            <td><input type="checkbox" name="permissions[]" value="{{$permission->id}}" ></td>
                                            <td>{{$permission->name}}</td>

                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="500">
                                            <button type="submit" class="btn btn-success">Vincular</button>
                                        </td>
                                    </tr>
                    </form>
                    </tbody>

                </table>
            </div>
            <div class="card-footer">

                @if (isset($filters))
                     {!!$permissions->appends($filters)->links()!!}
                @else
                     {!!$permissions->links()!!}
                @endif
            </div>
        </div>
@stop


