@extends('admin.master')

@section('title', 'LISTA DE USUARIOS')




@section('content') 




  <link rel='stylesheet' href='/css/avatar.css'>

  <div class="container-fluid mtop20">
    <div class="row">    
        <div class="col-md-12">
            @if (Session::has('message'))  
            <div class="alert alert-{{ Session::get('typealert') }} alert-dismissible fade show" role="alert">
                <h5><i class="icon fas fa-info"></i> {{ Session::get('message')}}</h5>				
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul> 					
                @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <script>
                $('.alert').slideDown();
                setTimeout(function(){ $('.alert').slideUp(); }, 5000);
                </script>
            </div>   
            @endif  
        </div> 

        <div class="col-md-3">
        <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                
                <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                    src="/img/default_avatar.png"
                    alt="User profile picture">
                </div>


                <a href="#" class="btn btn-primary btn-block"><b>Cargar imágen</b></a>
            </div>
            <!-- /.card-body -->
            </div>
        </div>







        <div class="col-md-9">

            
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-user mr-1"></i>
                    Registrar Usuario
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Cuenta</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Permisos</a>
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    {{ Form::open(['url' => '/user/add']) }}
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->                        
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name"> Nombre  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname"> Apelido  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="lastname" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="lastname"> Correo  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! form::submit('Registrar', ['class' => 'btn btn-block btn-primary btn-lg'])!!}
                                </div>
                            </div>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            weewew                      
                        </div> 
                    {!! Form::close() !!}     
                    </div>
                </div><!-- /.card-body -->
              </div>

        </div>
      
        
      
    </div>
</div>




@stop
