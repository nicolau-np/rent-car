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
        <h4>{{$submenu}}&nbsp;&nbsp;</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                  <tbody><tr>
                    <th>IMG</th>
                    <th>Nome Completo</th>
                    <th>Telefone</th>
                    <th>Bairro</th>
                  </tr>
                  @foreach ($getClientes as $clientes)
                  <tr>
                  <td><img src="{{asset($clientes->pessoa->foto)}}" style="width:53px; height:53px;" alt="" srcset=""/></td>
                  <td>{{$clientes->pessoa->nome}} {{$clientes->pessoa->sobrenome}}</td>
                  <td>{{$clientes->telefone}}</td>
                    <td>{{$clientes->bairro}}</td>

                  </tr>

                  @endforeach
                </tbody>
            </table>
            </div>

            {{$getClientes->links()}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
