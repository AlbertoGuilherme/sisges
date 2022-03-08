@extends('adminlte::page')
@section('title', 'Perfis')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('profiles.index') }}">Dashboard</a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('profiles.index') }}">Perfis</a> </li>
</ol>

@stop

@section('content')

<p>Criar novo Perfil <a href="{{route('profiles.create')}}" class="btn btn-dark">Novo</a></p>

<div class="card shadow mb-4">
    <div class="card-header">
     <h5 class="m-0 font-weight-bold text-primary"> Crie aqui perfis para os utilizadores do sistema</h5>


    </div>
    <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem" src="{{url('imgs/profile.svg')}}" alt="" srcset="">
            </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-warning">Lembre-se que em função do perfil que for criado o utilizador terá algumas permissões</button>
    </div>
</div>


        <div class="card mt-4">
            <div class="card-header">
               <form action="{{ route('profiles.search') }}" method="post" class="form form-inline">
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
                        @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>

                            <td style="width=10px;" >
                                {{-- <a href="{{ route('details.profile.index', $profile->url )}}" class="btn btn-info">Detalhes</a> --}}
                                <a href="{{ route('profiles.edit', $profile->id )}}" class="btn btn-success">edit</a>
                                <a href="{{ route('profiles.show', $profile->id )}}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('profiles.permissions',  $profile->id)}}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                                {{-- <a href="{{ route('profiles.plans',  $profile->id)}}" class="btn btn-warning"><i class="fas fa-list"></i></a> --}}


                            </td>



                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">

                @if (isset($filters))
                     {!!$profiles->appends($filters)->links()!!}
                @else
                     {!!$profiles->links()!!}
                @endif
            </div>
        </div>
@stop


