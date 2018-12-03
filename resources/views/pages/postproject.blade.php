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
                <div style="margin-top: 1em;margin-bottom: 2em;" id="fillProject">
                  <h5 style="font-weight: bold;">Tell us your projects</h5>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <input class="form-control" type="text" name="pname" placeholder="Name of your project">
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <select class="form-control" name="projecttype_id" id="projectType_select">
                      <option disabled>Your project type</option>
                      
                    </select>
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <textarea class="form-control" name="pdescription" placeholder="Your project description" rows="5"></textarea>
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Upload your project documents</label>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <select name="ptags" class="form-control" id="e9" multiple>
                      
                    </select>
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <input class="form-control" type="number" name="pprice" placeholder="Your project estimated price" rows="5">
                  </div>
                  <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                    <input class="form-control" type="text" name="pduration" placeholder="Your project estimated duration (days)" rows="5">
                  </div>
                  <div class="form-group">
                    <button type="button" id="submitProject" class="btn btn-primary">Post Project</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
@endsection