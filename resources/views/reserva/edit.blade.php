@extends('layouts.app')
@section('content')
<section class="section">
    <h1 class="section-header">
      <div>{{$menu}}</div>
    </h1>
    <div class="row">

    </div>

    <div class="row">

      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <div class="float-right">
              <a href="#" class="btn btn-primary">View All</a>
            </div>
        <h4>{{$submenu}}&nbsp;&nbsp;<a href="/automovel">Listar</a></h4>
          </div>
          <div class="card-body">
            @if (session('error'))
                    <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif

                @if (session('success'))
                    <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif
                {{Form::open(['method'=>"put", 'name'=>"formReserva", 'url'=>"/reservar/update/{$getAutomovel->id}", 'enctype'=>"multipart/form-data"])}}
              <div class="row">
                <div class="form-group col-6">
                  <label for="data">Data</label>
                  <input id="data" type="date" class="form-control" name="data" autofocus="">
                  @if($errors->has('data'))
                  <span class="text-danger">{{$errors->first('data')}}</span>
                 @endif
                </div>
                <div class="form-group col-6">
                  <label for="hora">Hora</label>
                  <input id="hora" type="time" class="form-control" name="hora">
                  @if($errors->has('hora'))
                  <span class="text-danger">{{$errors->first('hora')}}</span>
                 @endif
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  Salvar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
