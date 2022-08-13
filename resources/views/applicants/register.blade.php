  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/css/adminlte.min.css')}}">
</head>


<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      
  <img src="{{ url('assets/img/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"style="height: 90px; width: auto;">

    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Fullname" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          
          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
          </div>
          
        </div>
        <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          
          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
          </div>
          
        </div>

        <!-- <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div> -->


        <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
         @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          
          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
          </div>
          
        </div>

<!-- 
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> -->
        <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control"   placeholder="Retype password" name="password_confirmation" required autocomplete="new-password">
                           <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
              </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="{{ url('/login')}}" class="text-center">Already signed up?</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ url('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/js/adminlte.min.js')}}"></script>
</body>
</html>
