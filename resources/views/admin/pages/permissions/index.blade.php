@extends('adminlte::page')
@section('title', 'Permissões')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('permissions.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('permissions.index') }}">Permissões</a> </li>
</ol>

@stop

@section('content')

<p>Criar Nova Permissão <a href="{{route('permissions.create')}}" class="btn btn-dark">Nova</a></p>
<div class="card shadow">
    <div class="card-header">
       <form action="{{ route('permissions.search') }}" method="post" class="form form-inline">
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
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>

                    <td style="width=10px;" >
                        {{-- <a href="{{ route('details.permission.index', $permission->url )}}" class="btn btn-info">Detalhes</a> --}}
                        <a href="{{ route('permissions.edit', $permission->id )}}" class="btn btn-success">edit</a>
                        <a href="{{ route('permissions.show', $permission->id )}}" class="btn btn-warning">Ver</a>
                        <a href="{{ route('permissions.profiles', $permission->id )}}" class="btn btn-warning"> <i class="fas fa-address-book"></i> </a>


                    </td>



                </tr>
                @endforeach
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

    {{-- SVG de permissoes --}}
<div class="card shadow mb-4">
    <div class="card-header">
     <h5 class="m-0 font-weight-bold text-primary"> Cadastre aqui algumas permissões que os usuários terão dentro do seu sistema
     </h5>


    </div>
    <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem" src="{{url('imgs/permission.svg')}}" alt="" srcset="">
            </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-warning">Lembre-se que em função do perfil que for criado o utilizador terá algumas permissões</button>
    </div>
</div>


@stop


