@extends('sitio.master')
@section('title', 'CONTACTOS')


@section('content')


<div class="container-fluid mtop20">
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

  
    <div class="hold-transition login-page">
  
        <div class="login-box" style="width:60%">
          <!-- /.login-logo -->
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                Contáctanos
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>Nicole Pearson</b></h2>
                  <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                  <ul class="ml-4 mb-5 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="/images/user.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="#" class="btn btn-sm bg-teal">
                  <i class="fas fa-comments"></i>
                </a>
                <a href="#" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> View Profile
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.login-box -->

    </div>
</div>

@endsection   