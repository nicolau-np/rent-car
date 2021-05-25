@extends('layouts.app')
@section('content')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              System Rent-car
            </div>

            <div class="card card-primary">
            <div class="card-header"><h4>{{$menu}}</h4></div>

              <div class="card-body">

                @if (session('error'))
                    <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif

                @if (session('success'))
                    <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif
                {{Form::open(['method'=>"post", 'name'=>"formLogin", 'url'=>"/logar"])}}
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">{{$errors->first('email')}}
                        </div>
                        @endif
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Palavra-Passe
                      <div class="float-right">
                        <a href="forgot.html">
                          Esqueceu Palavra-Passe?
                        </a>
                      </div>
                    </label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        @if($errors->has('password'))
                        <div class="invalid-feedback">{{$errors->first('password')}}
                        </div>
                        @endif
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Lembrar Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                      Entrar
                    </button>
                  </div>
                {{Form::close()}}
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Não Tem conta? <a href="/register">Criar uma?</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; System Rent-car {{date('Y')}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
