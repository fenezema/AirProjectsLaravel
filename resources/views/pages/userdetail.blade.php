@extends('layouts.apApp')
@section('content')
	 <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img class="img-responsive img-circle" src="{{asset('resources/userProfile/'.$data->photo)}}" alt="" style="height: 25%;">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 content">
                    <h4>{{'@'.$data->username}}</h4>
                </div>
              </div>
            </div>            
            <div class="container">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><i class="fa fa-file-code-o"></i></td>
                      <td id="cuGithub"><span style="font-size: 12px">{{$data->github}}</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-laptop"></i></td>
                      <td id="cuWebsite"><span style="font-size: 12px">{{$data->website}}</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-address-book-o"></i></td>
                      <td id="cuPhone"><span style="font-size: 12px">{{$data->phone}}</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-envelope-o"></i></td>
                      <td id="cuEmail"><span style="font-size: 12px">{{$data->email}}</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- <div class="row">
                <div class="col-lg-12 content">
                  <div class="icon">
                    <i class="fa fa-file-code-o"><span style="font-size: 18px">https://github.com/jookrv</span></i>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 content">
                  <div class="icon">
                    <i class="fa fa-laptop"><span style="font-size: 18px">https://github.com/jookrv</span></i>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 content">
                  <div class="icon">
                    <i class="fa fa-address-book-o"><span style="font-size: 18px">{{$data->phone}}</span></i>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 content">
                  <div class="icon">
                    <i class="fa fa-envelope-o"><span style="font-size: 18px">{{$data->email}}</span></i>
                  </div>
                </div>
              </div> -->
              <br>
              <!-- <div class="row">
                <div class="col-lg-12 content">
                  <button class="btn btn-warning">Request me!</button>
                </div>
              </div> -->
            </div>

          </div>

          <div class="col-lg-6 content">
            <h2 id="cuName">{{$data->lastname}}, {{$data->firstname}}
              @if($data->membership=="member")
                <i class="fa fa-check-circle"></i>
              @endif
            </h2>
            <h3 id="cuDescTitle">{{$data->descTitle}}</h3>
            <p id="cuDesc">{{$data->describe}}</p>
            @if($data->role=="worker")
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <h5>I'm good with</h5>
              <br>
              <div class="row" id="editSkills">
                @foreach($data->tags as $tagnya )
                <img class="img-responsive img-circle" src="{{asset('resources/logo/'.$tagnya->utag.'.png')}}" title="{{$tagnya->utag}}" style="height: 20%;">
                @endforeach
              </div>
            </div>
            @endif
          </div>


          <div class="col-lg-3 content">
            <h3>Balance : </h3>
            <h4><mark>$ {{$data->saldo}}</mark></h4>
            <br>
            @if($data->role=="worker")
            <div class="row">
              <div class="col-lg-4">
                <h6>Past Projects</h6>
              </div>
              <div class="col-lg-4">
                <label id="slideTo" class="switch">
                  <input type="checkbox" checked>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-4">
                <h6>Projects Stats</h6>
              </div>
            </div>
            @endif
            
            <div id="slideToContent">    
            @if($data->role=="worker")
              <div class="row">
                <div class="col-lg-4 content" style="background-color:    #FAEBD7;border-bottom: 2px solid white">
                  <h2 style="text-align: center;vertical-align: middle;">3</h2>
                </div>
                <div class="col-lg-8 content">
                  <h5>Projects Taken</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 content" style="background-color:    #FAEBD7;border-bottom: 2px solid white">
                  <h2 style="text-align: center;vertical-align: middle;">2</h2>
                </div>
                <div class="col-lg-8 content">
                  <h5>Projects Finished</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 content" style="background-color:    #FAEBD7;border-bottom: 2px solid white">
                  <h2 style="position: relative;top: 50%;transform: translateY(-50%);font-size: 25px">100%</h2>
                </div>
                <div class="col-lg-8 content">
                  <h5>Projects on scheduled</h5>
                </div>
              </div>
            @elseif($data->role == "po")
              <h3 style="color: #6495ED">Projects by user <span style="color: black">{{$data->username}}</span></h3>
              <div class="row">
                <div class="col-lg-4 content" style="background-color:    #FAEBD7;border-bottom: 2px solid white">
                  <h2 style="text-align: center;vertical-align: middle;">93</h2>
                </div>
                <div class="col-lg-8 content">
                  <h5>Past Projects</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 content" style="background-color:    #FAEBD7;border-bottom: 2px solid white">
                  <h2 style="text-align: center;vertical-align: middle;">3</h2>
                </div>
                <div class="col-lg-8 content">
                  <h5>Ongoing Projects</h5>
                </div>
              </div>
              
              <br>
              <div class="content">
                <h3 style="color: #6495ED">Recents Projects</h3>
              </div>
              
              <h5>Phalcon Website for DarrenJE Institution Internal Blockchain Forum</h5>
              <p><a href="#">See more</a></p>
              <hr>
              <h5>An IOS/Android Project</h5>
              <p><a href="#">See more</a></p>
              <hr>
              <h5>Build API</h5>
              <p><a href="#">See more</a></p>
              <hr>
            @endif
            </div>
            <br>
          </div>
        </div>
      </div>
    </section><!-- #about -->
@endsection