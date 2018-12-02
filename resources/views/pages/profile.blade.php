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
            <h2 id="cuName">{{$data->lastname}}, {{$data->firstname}}</h2>
            <h3 id="cuDescTitle">{{$data->descTitle}}</h3>
            <p id="cuDesc">{{$data->describe}}</p>
          </div>


          <div class="col-lg-3 content">
            <h3>Balance : </h3>
            <h4><mark>$ {{$data->saldo}}</mark></h4>
            <br>
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
            
            <div id="slideToContent">    
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
            </div>
            <br>
            <div id="btEditcuUser">
              <button class="btn btn-success" id="editCurrentProfile">Edit Profile</button>
              <button class="btn btn-success" id="editCurrentProfileSave" style="display: none">Save</button>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #about -->
@endsection