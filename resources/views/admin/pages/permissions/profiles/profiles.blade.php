@extends('adminlte::page')
@section('title', "Perfis  da permissao{$permission->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('profiles.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('profiles.index') }}">Perfis</a> </li>

</ol>

@stop

@section('content')

<h1>Perfis da  permissao {{$permission->name}}</h1>


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
                        @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>

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


