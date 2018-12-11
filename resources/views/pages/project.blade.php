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
                  <p5 style="font-weight: 700;">By User : <a href="{{route('workersid',[$data->user_id])}}">{{$data->user_names}}</a></h5>
                </div>
                <div class="col-sm-5" align="right">
                  <h2 style="font-size: 28px;font-weight: 700;">Budget : <span class="badge badge-pill badge-success">Rp. {{$data->pprice}}</span></h2>
                  <p5 style="font-weight: 700;">Estimated projects duration : {{$data->pduration}} days</h5>
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
              @if(Auth::user()->role=="worker")
              <input id="pid" hidden value="{{$data->id}}">
              <input id="uid" hidden value="{{Auth::user()->id}}">
              <button type="button"  id="requestToPO" class="btn btn-danger pull-right">Take this project</button>
              @endif
            </div>
          </div>
      </div>
    </section>
@endsection