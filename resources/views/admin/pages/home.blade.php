@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<h6 class="display-4 mb-4">Olá {{$userLogged}}</h6>
<h5>Seja Bem vindo ao Sisges</h5>

{{-- CARDS INICIAIS --}}

{{-- Users


    <div class="row animation__shake">
        @admin
        <div class="col-md-3 col-sm-6 col-xs-12 ">

            <div class="info-box shadow">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-user">  </i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text font-weight-bold text-primary text-uppercase">Usuários</span>
                    <span class="info-box-number">{{$totalUsers}}</span>
                </div>
            </div>
        </div>
@endadmin
    {{-- Profiles --}}

    <div class="container-fluid">
            <div class="row">
@admin
        <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$totalPermissions}}</h3>
                            <p>Permissões</p>
                        </div>
                        <div class="icon">
                           <i class="fas fa-lock"></i>
                    </div>
                    <a href= "#" class="small-box-footer">Ver mais
                    <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    
            </div>
        </div>
    @endadmin
        @admin
                {{-- Pedidos --}}
   
          <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$totalOrders}}</h3>
                            <p>Pedidos</p>
                        </div>
                        <div class="icon">
                           <i class="fas fa-chart-pie"></i>
                    </div>
                    <a href= "{{route('orders.index')}}" class="small-box-footer">Ver mais
                    <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    
             </div>
            </div>
@endadmin
                 {{-- PedidosUsers --}}
   @user
          <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$userOrders}}</h3>
                            <p>Pedidos</p>
                        </div>
                        <div class="icon">
                           <i class="fas fa-chart-pie"></i>
                    </div>
                    <a href= "{{route('orders.index')}}" class="small-box-footer">Ver mais
                    <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    
             </div>
            </div>
     @enduser
 
@admin
{{-- Profiles --}}
             <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$totalProfiles}}</h3>
                            <p>Perfis</p>
                        </div>
                        <div class="icon">
                           <i class="far fa-user-circle"></i>
                         </div>
                    <a href= "#" class="small-box-footer">Ver mais
                    <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    
                </div>
      </div>
@endadmin

@admin
        {{-- Users --}}
             <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$totalUsers}}</h3>
                            <p>Utilizadores</p>
                        </div>
                        <div class="icon">
                           <i class="fas fa-user-tie"></i>
                         </div>
                    <a href= "{{route('users.index')}}" class="small-box-footer">Ver mais
                    <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    
                
      </div>
      </div>
   @endadmin 
            {{-- ENDUSER --}}

          {{-- cOMPLAINSUsers --}}
             <div class="col-lg-3 col-6 animation__shake">
                <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$userComplain}}</h3>
                            <p>Reclamações</p>
                        </div>
                        <div class="icon">
                           <i class="fas fa-angry"></i>
                         </div>
                    <a href= "{{route('complains.index')}}" class="small-box-footer">Ver mais
                    <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    
                </div>
      

         </div>
    </div>

       

   


@endsection
