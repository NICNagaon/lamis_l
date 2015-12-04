@extends('layout')

@section('breadcrumb')
<li><a href="/districts">Home</a></li>	
<li><a href="/districts/{{{$district->id}}}">{{{$district->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}">{{{$subdiv->name}}}</a></li>
<li>{{{$circle->name}}}</li>
@stop

@section('content')

<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">List of Mouzas</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
				@foreach ($mouzas as $mouza)
					<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}" class="list-group-item">{{{$mouza->name}}}<br/>{{{$mouza->name_local}}}</a>
				@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">New Mouza</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas" method="POST">
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
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Circle</h3>
			</div>
			<div class="panel-body">
				
				<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}" method="POST">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-6 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{{$circle->name}}}">
						</div>
					</div>
					<div class="form-group">
						<label for="nameLocal" class="col-sm-6 control-label">Name in Local Language</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nameLocal" name="nameLocal" placeholder="Name in Local Language" value="{{{$circle->name_local}}}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
						</div>
					</div>
				</form>
				
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Delete Circle</h3>
			</div>
			<div class="panel-body">
				
				<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/delete" method="POST">
					
					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-danger btn-block">DELETE</button>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div> 
@stop