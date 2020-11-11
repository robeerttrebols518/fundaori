@extends('admin.master')

@section('title', 'REGISTRAR PLANTILLA')




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



        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-user mr-1"></i>
                    Registrar Plantilla
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#datos-personales" data-toggle="tab">Datos Personales</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#datos-santero" data-toggle="tab">Santero</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#datos-babalamo" data-toggle="tab">Babalamo</a>
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    {{ Form::open(['url' => '/plantilla/add']) }}
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->                        
                        <div class="chart tab-pane active" id="datos-personales" style="position: relative; height: 100%;">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="nacionalidad">Nacionalidad</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        {!! form::select('nacionalidad', getNacionalidadArray(), 0, ['class' => 'form-control']) !!}
                                    </div>
                                </div>     
                                <div class="col-md-3">
                                    <label for="docident"> Documento  de identidad *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="docident" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="fecnac"> Fecha de Nacimiento *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input name="fecnac" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="lugnac"> Lugar de Nacimiento *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="lugnac" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                   
                                <div class="col-md-4">
                                    <label for="nombre"> Nombre  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" >
                                    </div>
                                </div>    
                                <div class="col-md-4">
                                    <label for="apellido"> Apelido  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="apellido" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="genero">Genero</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        {!! form::select('genero', getGeneroId(), 0, ['class' => 'form-control']) !!}
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <label for="estcivil"> EStado Civil  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        {!! form::select('estcivil', getEstadoCivildArray(), 0, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="profesion"> Profesión  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="profesion" class="form-control" >
                                    </div>
                                </div>    
                                <div class="col-md-4">
                                    <label for="nivedu"> Nivel de Educación  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="nivedu" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="oficio"> Oficio  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="oficio" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="discapacidad"> Tiene alguna discapacidad  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        {!! form::select('discapacidad',  ['Si' => 'Si', 'No' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>    
                                <div class="col-md-5">
                                    <label for="estado"> Estado  *</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="estado" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="tlocal"> Teléfono  Local</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="tlocal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="tmovil"> Teléfono  Celular</label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                        </div>
                                        <input type="text" name="tmovil" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email"> Correo  *</label> 
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
                                    {!! form::submit('Guardar Datos Personales', ['class' => 'btn btn-block btn-primary btn-lg'])!!}
                                </div>
                            </div>
                        </div>
                        <div class="chart tab-pane" id="datos-santero" style="position: relative; height: 300px;">
                            santero                      
                        </div> 
                        <div class="chart tab-pane" id="datos-babalamo" style="position: relative; height: 300px;">
                            babalamo                      
                        </div> 
                    {!! Form::close() !!}     
                    </div>
                </div><!-- /.card-body -->
              </div>

        </div>
      
        
      
    </div>
</div>




@stop
