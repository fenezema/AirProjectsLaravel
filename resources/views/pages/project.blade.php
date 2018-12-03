@extends('layouts.apApp')
@section('content')
     <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="row">
                <div class="col-sm-7" align="left">
                  <h2 style="font-size: 28px;font-weight: 700;">{{$data->pname}}</h2>
                </div>
                <div class="col-sm-5" align="right">
                  <h2 style="font-size: 28px;font-weight: 700;">Budget : <span class="badge badge-pill badge-success">Rp. {{$data->pprice}}</span></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <h7>
                {{$data->pdescription}}
              </h7>
              <hr>
              <h7>
                <b>Skills : </b>
                @foreach($data->ptags as $tag)
                  <a href="">{{$tag->ptag}}</a>
                @endforeach
              </h7>
              <button type="button" class="btn btn-danger pull-right">Take this projects</button>
            </div>
          </div>
      </div>
    </section>
@endsection