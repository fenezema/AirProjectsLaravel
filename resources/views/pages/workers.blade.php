@extends('layouts.apApp')
@section('content')
	<section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Workers</h2>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <div class="box wow fadeInRight">
              <div style="padding: 0px">
                <label><b>Skills</b></label>
                <div class="form-group" id="homeDivSkillFilter">
                  <label class="form-control-label">
                    <select name="ptags" class="form-control" id="e1" multiple>
                    
                    </select>
                  </label>
                </div>
                <div class="form-group">
                  <label class="form-control-label">
                    <button class="btn btn-success" id="searchSkillTags">Search</button>
                  </label>
                </div>
              </div>
              <div style="padding: 0px">
                <hr>
                <label><b>Budget</b></label>
                <div class="form-group">
                  <input class="form-control-range" type="range" name="budget">
                  <input class="form-control" type="text" name="min-budget" placeholder="Minimal budget" style="margin-bottom: 1em;margin-top: 1em;">
                  <input class="form-control" type="text" name="max-budget" placeholder="Maximal budget">
                </div>
              </div>
              <div style="padding: 0px">
                <hr>
                <label><b>Duration</b></label>
                <form>
                  <div class="form-group">
                    <input class="form-control-range" type="range" name="duration">
                    <input class="form-control" type="text" name="min-duration" placeholder="Minimal duration" style="margin-bottom: 1em;margin-top: 1em;">
                    <input class="form-control" type="text" name="max-duration" placeholder="Maximal duration">
                  </div>
                </form>
              </div>
          </div>
        </div>
          <div class="col-lg-9">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
            <div class="row">
              <div class="col-sm-7" align="left"><label id="projectCount">{{$datas_count}} workers found</label></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2" align="left">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Sort by : 
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">All</a>
                    <a class="dropdown-item" href="#">Recommended</a>
                    <a class="dropdown-item" href="#">Member</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div id="showProject" class="box wow fadeInRight" data-wow-delay="0.2s">
              @foreach($datas as $data)
              <div>
                <div class="icon"><img class="img-fluid" src="{{asset('resources/userProfile/'.$data->photo)}}" alt="" style="height: 120px;margin-right: 1em;"></div>
                <h4 class="title"><a href="{{route('workersid',[$data->id])}}">{{$data->firstname}} {{$data->lastname}}</a>
                  @if($data->membership=="member")
                    <i class="fa fa-check-circle"></i>
                  @endif
                </h4>
                <p class="description">{{$data->email}} {{$data->phone}}</p>
                <p class="description">
                @foreach($data->tags as $tagnya)
                  <a href="#" style="margin-right: 1em;">{{$tagnya->utag}}</a>
                @endforeach
                </p>
                <p class="description">{{$data->pdescription}}</p>
                <p class="description" style="font-size: 20px;margin-top: 1em;">Level : <span class="badge badge-pill badge-info">
                  @if($data->level >= 0 && $data->level < 39)
                    Baby
                  @elseif($data->level >= 40 && $data->level < 99)
                    Newbie
                  @elseif($data->level >= 100 && $data->level < 299)
                    Novice
                  @elseif($data->level >= 300 && $data->level < 599)
                    Semi-Professional
                  @elseif($data->level >= 600 && $data->level < 999)
                    Professional
                  @elseif($data->level >= 1000)
                    AirKinG
                  @endif
                </span></p>
              </div>
              <hr>
              @endforeach
            </div>
          </div>
      </div>
    </section>
@endsection