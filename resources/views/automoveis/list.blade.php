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
        <h4>{{$submenu}}</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                  <tbody><tr>
                    <th>#</th>
                    <th>IMG</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Operação</th>
                  </tr>
                  @foreach ($getAutomoveis as $automoveis)
                  <tr>
                    <td>1</td>
                    <td>Irwansyah Saputra</td>
                    <td>2017-01-09</td>
                    <td><div class="badge badge-success">Active</div></td>
                    <td>
                        <a href="#" class="btn btn-action btn-secondary">Editar</a>
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
