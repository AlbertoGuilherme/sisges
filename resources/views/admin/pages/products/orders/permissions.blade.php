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

<h1>Permissões do perfil {{$profile->name}}</h1>
    <a href="{{route('profiles.permissions.avalaible', [$profile->id])}}" class="btn btn-dark">Novo</a>


        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>

                                <th>Nome</th>

                                <th width="50">Accoes</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>

                            <td style="width=10px;" >
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id] )}}" class="btn btn-danger">Desvincular</a>
                            </td>



                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
{{--
                @if (isset($filters))
                     {!!$permissions->appends($filters)->links()!!}
                @else
                     {!!$permissions->links()!!}
                @endif --}}
            </div>
        </div>
@stop


