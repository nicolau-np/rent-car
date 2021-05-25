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
        <h4>{{$submenu}}&nbsp;&nbsp;<a href="/automovel/create">Novo</a></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                  <tbody><tr>
                    <th>IMG</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matricula</th>
                    <th>Preco</th>
                    <th>Modalidade</th>
                    <th>Estado</th>
                    <th>Operação</th>
                  </tr>
                  @foreach ($getAutomoveis as $automoveis)
                  <tr>
                  <td><img src="{{asset($automoveis->foto)}}" style="width:53px; height:53px;" alt="" srcset=""/></td>
                  <td>{{$automoveis->marca}}</td>
                    <td>{{$automoveis->modelo}}</td>
                    <td>{{$automoveis->matricula}}</td>
                  <td>{{number_format($automoveis->preco,2,',','.')}}</td>
                  <td>{{$automoveis->tipo}}</td>
                    <td>{{$automoveis->estado}}</td>
                    <td>
                        <a href="/automovel/edit/{{$automoveis->id}}" class="btn btn-action btn-secondary">Editar</a>
                    </td>
                  </tr>

                  @endforeach
                </tbody>
            </table>
            </div>

            {{$getAutomoveis->links()}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
