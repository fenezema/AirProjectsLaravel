@extends('layouts.apApp')
@section('content')
<section id="services">
	<div class="container">
		<div class="section-header" style="margin-bottom: 3em;">
			<h2>My Projects</h2>
		</div>
		@foreach($datas as $data)
		<div class="row">
			<div class="col-md-8">
				<div class="box wow fadeInRight">
	                <h4 class="title">{{$data->pname}}</h4>
	                <p class="description"><b>{{$data->pdescription}}</b></p>
	                <p class="description" style="font-size: 20px;margin-top: 1em;">
	                	<span class="badge badge-pill badge-success" style="margin-right: 1em;">Rp. {{$data->pprice}}</span>
	                	<span class="badge badge-pill badge-danger" style="margin-right: 1em;">{{$data->pduration}} hari</span>
	                	<button class="btn btn-primary" type="button" style="margin-left: 20em">Finish</button>
	                </p>
	                <hr>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box wow fadeInRight">
					<h5 class="title">Listed Applicants : </h5>
					@foreach($data->worker_names as $worker)
	                <h6 class="title">{{$worker->wname}}</h6>
	                
	                @endforeach
				</div>
			</div>
		</div>
		@endforeach
	</div>
</section>
@endsection