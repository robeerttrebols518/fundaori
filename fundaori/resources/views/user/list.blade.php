@extends('sitio.master')

@section('title', 'LISTA DE USUARIOS')




@section('content') 




  <link rel='stylesheet' href='/css/avatar.css'>

  <div class="container-fluid mtop20">
    <div class="row">    
      <div class="col-md-3">

        
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="/images/default_avatar.png"
                   alt="User profile picture">
            </div>

          <h4 class="profile-username text-center">{{auth::user()->name}} {{auth::user()->lastname}}</h4>


            <a href="#" class="btn btn-primary btn-block"><b>Cargar imágen</b></a>
          </div>
          <!-- /.card-body -->
        </div>
      </div>







      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Mis Datos</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Seguridad</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="container-fluid ">
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
                  {{ Form::open(['url' => '/account/edit/info']) }}
                    <div class="row mtop20">
                      <div class="col-md-6 m-bot-15">
                        <label for="name"> Nombre  *</label> 
                        {!! form::text('name', Auth::user()->name, ['class' => 'form-control', 'required']) !!}
                      </div>
                      <div class="col-md-6 m-bot-15">
                        <label for="lastname"> Apellido  *</label> 
                        {!! form::text('lastname', Auth::user()->lastname, ['class' => 'form-control', 'required']) !!}
                      </div>
                    </div>
                    <div class="row mtop20">
                      <div class="col-md-6 m-bot-15">
                        <label for="phone"> Teléfono  *</label> 
                        {!! form::text('phone', Auth::user()->phone, ['class' => 'form-control', 'required']) !!}
                      </div>
                      <div class="col-md-6 m-bot-15">
                        <label for="gender"> Género  *</label> 
                        {!! form::select('gender', ['0'=>'Sin espeficar', '1'=>'Hombre', '2'=>'Mujer'], Auth::user()->gender, ['class' => 'form-control']) !!}
                      </div>
                    </div>     
                    <div class="row mtop20">
                        <div class="col-md-12 "><label>  Fecha de nacimiento  *</label></div>
                        <div class="col-md-4 m-bot-15">
                          {!! form::number('year', $birthday[0], ['class' => 'form-control', 'min'=>getUserYears()[1], 'max'=>getUserYears()[0], 'required', 'placeholder' => 'AÑO']) !!}
                        </div>
                        <div class="col-md-4 m-bot-15">
                          {!! form::select('month', getMonts('list', null), $birthday[1], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4 m-bot-15">
                          {!! form::number('day', $birthday[2], ['class' => 'form-control', 'min'=>1, 'max'=>31, 'required',  'placeholder' => 'DÍA']) !!}
                        </div>
                    </div>
                    <div class="row mtop20">
                      <div class="col-md-12 m-bot-15">
                        <label for="email"> Correo electrónico  *</label> 
                        {!! form::text('email', Auth::user()->email, ['class' => 'form-control', 'required']) !!}
                      </div>
                    </div>
                    <div class="row mtop20">
                      <div class="col-md-12">
                        {!! form::submit('Actualizar', ['class' => 'btn btn-block btn-primary btn-lg'])!!}
                      </div>
                    </div>
                    {!! Form::close() !!} 
                </div>
              </div>
              <div class="tab-pane" id="timeline">
                <div class="container-fluid ">
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
                  {{ Form::open(['url' => '/account/edit/password']) }}
                    <div class="row mtop20">
                      <div class="col-md-12 m-bot-15">
                        <label for="email"> Constraseña Actual  *</label> 
                        {!! form::password('apassword', null, ['class' => 'form-control', 'required']) !!}
                      </div>
                    </div>
                    <div class="row mtop20">
                      <div class="col-md-12 m-bot-15">
                        <label for="email"> Nueva Contraseña  *</label> 
                        {!! form::password('password', null, ['class' => 'form-control', 'required']) !!}
                      </div>
                    </div>                    
                    <div class="row mtop20">
                      <div class="col-md-12 m-bot-15">
                        <label for="email"> Confirnar Contraseña  *</label> 
                        {!! form::password('cpassword',null, ['class' => 'form-control', 'required']) !!}
                      </div>
                    </div>
                    <div class="row mtop20">
                      <div class="col-md-12">
                        {!! form::submit('Cambiar', ['class' => 'btn btn-block btn-primary btn-lg'])!!}
                      </div>
                    </div>
                    {!! Form::close() !!} 
                </div>




              </div>              
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      
        
      
    </div>
</div>




@stop
