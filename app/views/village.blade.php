@extends('layout')

@section('breadcrumb')
<li><a href="/districts">Home</a></li>	
<li><a href="/districts/{{{$district->id}}}">{{{$district->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}">{{{$subdiv->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}">{{{$circle->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}">{{{$mouza->name}}}</a></li>
<li>Lot - {{{$lot->name}}}</li>
@stop

@section('content')

<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">List of Villages</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
				@foreach ($villages as $village)
					<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}" class="list-group-item">{{{$village->name}}}<br/>{{{$village->name_local}}}</a>
				@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">New Village</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages" method="POST">
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
							<label for="factor" class="col-sm-6 control-label">Multiplication Factor</label>
							<div class="col-sm-6">
								<input type="decimal" class="form-control" id="factor" name="factor" placeholder="Multiplication Factor" tabindex="3">
							</div>
						</div>
						<div class="form-group">
							<label for="lacase" class="col-sm-6 control-label">LA Case</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="lacase" name="lacase" placeholder="La Case" tabindex="4">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-6 control-label">Chainage</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="cFrom" name="cFrom" placeholder="From" tabindex="5">
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="cTo" name="cTo" placeholder="To" tabindex="6">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-primary btn-block" tabindex="7">SUBMIT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Mouza</h3>
			</div>
			<div class="panel-body">
				
				<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}" method="POST">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-6 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{{$mouza->name}}}">
						</div>
					</div>
					<div class="form-group">
						<label for="nameLocal" class="col-sm-6 control-label">Name in Local Language</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nameLocal" name="nameLocal" placeholder="Name in Local Language" value="{{{$mouza->name_local}}}">
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
				
				<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/delete" method="POST">
					
					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-danger btn-block">DELETE</button>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
	-->
</div> 
@stop