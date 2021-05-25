@extends('layouts.app')
@section('content')

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                System Rent-car
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Registro</h4></div>

              <div class="card-body">
                @if (session('error'))
                    <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif

                @if (session('success'))
                    <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif
                {{Form::open(['method'=>"post", 'name'=>"formLogin", 'url'=>"/regiter_store"])}}
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nome </label>
                      <input id="frist_name" type="text" class="form-control" name="nome" autofocus>
                      @if($errors->has('nome'))
                      <span class="text-danger">{{$errors->first('nome')}}</span>
                      @endif
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Sobrenome</label>
                      <input id="last_name" type="text" class="form-control" name="sobrenome">
                      @if($errors->has('sobrenome'))
                      <span class="text-danger">{{$errors->first('sobrenome')}}</span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    @if($errors->has('email'))
                      <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Palavra-Passe</label>
                      <input id="password" type="password" class="form-control" name="palavra_passe">
                      @if($errors->has('palavra_passe'))
                      <span class="text-danger">{{$errors->first('palavra_passe')}}</span>
                    @endif
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Confirm. Palavra-Passe</label>
                      <input id="password2" type="password" class="form-control" name="password_confirm">
                      @if($errors->has('password_confirm'))
                      <span class="text-danger">{{$errors->first('password_confirm')}}</span>
                    @endif
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">Aceitar termos de contrato</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Registrar
                    </button>
                  </div>
                {{Form::close()}}
              </div>
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
