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
                    <i class="ion ion-ios-paper-outline text-primary"></i>
                  </div>
                  <div class="card-header">
                    <h4>News</h4>
                  </div>
                  <div class="card-body">
                    40 <span class="text-muted">/ ∞</span>
                  </div>
                  <div class="card-progressbar">
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar" role="progressbar" style="width: 5%;"></div>
                    </div>
                  </div>
                  <div class="card-footer">
                    Sunt in culpa qui officia deserunt mollit anim id est laborum.
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
