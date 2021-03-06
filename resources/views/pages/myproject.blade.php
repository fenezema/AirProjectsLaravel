@extends('layouts.apApp')
@section('content')
<section id="services">
	<div class="container">
		<div class="section-header" style="margin-bottom: 3em;">
			<h2>My Projects</h2>
		</div>
		<div class="row">
			<div class="col-md-10">
				<div class="box wow fadeInRight">
					@foreach($datas as $data)
	                <h4 class="title">{{$data->pname}}</h4>
	                <p class="description"><b>[{{$data->worker_id}}]</b></p>
	                <p class="description" style="font-size: 20px;margin-top: 1em;">
	                	<span class="badge badge-pill badge-success" style="margin-right: 1em;">Rp. {{$data->pprice}}</span>
	                	<span class="badge badge-pill badge-danger" style="margin-right: 1em;">{{$data->pduration}} hari</span>
	                	<button class="btn btn-primary" type="button" style="margin-left: 20em">Finish</button>
	                </p>
	                <hr>
	                @endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endsection