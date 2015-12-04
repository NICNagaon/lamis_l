@extends('layout')

@section('breadcrumb')
<li><a href="#">Home</a></li>	
@stop

@section('content')

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">List of Districts</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
				@foreach ($districts as $district)
					<a href="/districts/{{{$district->id}}}" class="list-group-item">{{{$district->name}}}<br/>{{{$district->name_local}}}</a>
				@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">New District</h3>
			</div>
			<div class="panel-body">
				
				<form class="form-horizontal" action="/districts" method="POST">
					<div class="form-group">
						<label for="name" class="col-sm-6 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" tabindex="1">
						</div>
					</div>
					<div class="form-group">
						<label for="nameLocal" class="col-sm-6 control-label">Name in Local Language</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nameLocal" name="nameLocal" placeholder="Name in Local Language" tabindex="2">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<button type="submit" class="btn btn-primary btn-block" tabindex="3">SUBMIT</button>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div> 
@stop