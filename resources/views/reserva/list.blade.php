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
                    <th>IMG Automovel</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Quant.</th>
                    <th>Preco Total</th>
                  </tr>
                  @foreach ($getReservas as $reservas)
                  <tr>
                  <td><img src="{{asset($reservas->automovel->foto)}}" style="width:53px; height:53px;" alt="" srcset=""/></td>
                  <td>{{$reservas->automovel->marca}}</td>
                    <td>{{$reservas->automovel->modelo}}</td>
                  <td>{{$reservas->cliente->pessoa->nome}} {{$reservas->cliente->pessoa->sobrenome}}</td>
                  <td>{{$reservas->data_requisicao}}</td>
                  <td>{{$reservas->hora_requisicao}}</td>
                  <td>{{$reservas->tempo}}</td>
                  <td>{{number_format($reservas->preco_total,2,',','.')}}</td>
                  </tr>

                  @endforeach
                </tbody>
            </table>
            </div>

            {{$getReservas->links()}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
