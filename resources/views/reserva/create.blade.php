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
             <div class="row">

                @foreach ($getAutomoveis as $automoveis)
                <div class="col-12 col-sm-4 col-lg-4">
                <div class="card card-sm-2">
                  <div class="card-icon">
                  <img src="{{asset($automoveis->foto)}}" style="width:53px; height:53px;" alt="" srcset="">
                  </div>
                  <div class="card-header">
                  <h4>{{$automoveis->marca}} {{$automoveis->modelo}}</h4>
                  </div>
                  <div class="card-body">
                    {{number_format($automoveis->preco, 2,',','.')}} <span class="text-muted">Akz</span>
                  </div>
                  <div class="card-progressbar">
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar" role="progressbar" style="width: 5%;"></div>
                    </div>
                  </div>
                  <div class="card-footer">
                    Modalidade de Pagamento: {{$automoveis->tipo}}
                    @if ($automoveis->estado=="on")
                        <a href="/reservar/edit/{{$automoveis->id}}" class="badge badge-success">Reservar</a>
                    @else
                    <a href="#" class="badge badge-danger">Indisponivel</a>
                    @endif

                  </div>

                </div>
              </div>
            @endforeach
            </div>
         </div>
        </div>
      </div>
    </div>
  </section>
@endsection
