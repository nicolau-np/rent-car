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
                {{Form::open(['method'=>"post", 'name'=>"formAutomovel", 'url'=>"/automovel/store", 'enctype'=>"multipart/form-data"])}}
              <div class="row">
                <div class="form-group col-6">
                  <label for="marca">Marca</label>
                  <input id="marca" type="text" class="form-control" name="marca" autofocus="">
                  @if($errors->has('marca'))
                  <span class="text-danger">{{$errors->first('marca')}}</span>
                 @endif
                </div>
                <div class="form-group col-6">
                  <label for="modelo">Modelo</label>
                  <input id="modelo" type="text" class="form-control" name="modelo">
                  @if($errors->has('modelo'))
                  <span class="text-danger">{{$errors->first('modelo')}}</span>
                 @endif
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="cilindragem">Cilindragem</label>
                  <input id="cilindragem" type="text" class="form-control" name="cilindragem" autofocus="">
                  @if($errors->has('cilindragem'))
                  <span class="text-danger">{{$errors->first('cilindragem')}}</span>
                 @endif
                </div>
                <div class="form-group col-6">
                  <label for="matricula">Matricula</label>
                  <input id="matricula" type="text" class="form-control" name="matricula">
                  @if($errors->has('matricula'))
                  <span class="text-danger">{{$errors->first('matricula')}}</span>
                 @endif
                </div>
              </div>

              <div class="form-group">
                <label for="foto">Foto</label>
                <input id="foto" type="file" class="form-control" name="foto">
                @if($errors->has('foto'))
                    <span class="text-danger">{{$errors->first('foto')}}</span>
                @endif
              </div>

              <div class="row">
                <div class="form-group col-4">
                  <label for="estado" class="d-block">Estado</label>
                  {{Form::select('estado', [
                      'on'=>"on",
                  'off'=>"off"
                  ], null, ['class'=>"form-control"])}}

                @if($errors->has('estado'))
                    <span class="text-danger">{{$errors->first('estado')}}</span>
                @endif
                </div>

                <div class="form-group col-4">
                    <label for="preco" class="d-block">Preço</label>
                    <input id="preco" type="number" class="form-control" name="preco">
                  @if($errors->has('preco'))
                      <span class="text-danger">{{$errors->first('preco')}}</span>
                  @endif
                  </div>

                  <div class="form-group col-4">
                    <label for="modalidade" class="d-block">Modalidade de Pagamento</label>
                    {{Form::select('modalidade', [
                        'hora'=>"hora",
                        'minuto'=>"minuto"
                    ], null, ['class'=>"form-control"])}}

                  @if($errors->has('modalidade'))
                      <span class="text-danger">{{$errors->first('modalidade')}}</span>
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
