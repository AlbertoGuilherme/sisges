@extends('adminlte::page')
@section('tite', "Editar Reclamação {$complain->name}")

@section('content_header')

@stop

@section('content')

    <form action="{{route('complains.update', $complain->id)}}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        @include('Admin.pages.complains._partials.form')
    </form>



@stop


