@extends('layouts.app')
@section('content')
<section class="section">
    <h1 class="section-header">
      <div>Home</div>
    </h1>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-primary">
            <i class="ion ion-person"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Usuários</h4>
            </div>
            <div class="card-body">
              10
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-danger">
            <i class="ion ion-ios-paper-outline"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Carros</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-warning">
            <i class="ion ion-paper-airplane"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Reservas</h4>
            </div>
            <div class="card-body">
              1,201
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-success">
            <i class="ion ion-record"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Categorias</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <div class="float-right">
              <a href="#" class="btn btn-primary">View All</a>
            </div>
            <h4>Seja Bem-vindo</h4>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
  </section>



  @endsection
