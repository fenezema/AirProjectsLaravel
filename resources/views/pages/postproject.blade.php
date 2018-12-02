@extends('layouts.apApp')
@section('content')
    <div class="container" style="margin-top: 1%;margin-bottom: 1%;">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <div id="header" class="text-center">
                <div id="logo">
                  <h1><a href="#">Air<span>Project</span></a></h1>
                </div>
              </div>
                <div style="margin-top: 1em;margin-bottom: 2em;">
                <form method="POST" action="{{route('storeProject')}}">
                  @csrf
                  <h5 style="font-weight: bold;">Tell us your projects</h5>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <input class="form-control" type="text" name="project-name" placeholder="Name of your project">
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <select class="form-control" name="project-type">
                      <option selected>Your project type</option>
                      <option value="1">1</option>
                      <option value="1">1</option>
                      <option value="1">1</option>
                      <option value="1">1</option>
                      <option value="1">1</option>
                    </select>
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <textarea class="form-control" name="project-description" placeholder="Your project descryption" rows="5"></textarea>
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Upload your project documents</label>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <input class="form-control" type="text" name="project-skill" placeholder="What skill are required" data-role="tagsinput">
                  </div>
                </form>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-primary">Post Project</button>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
@endsection