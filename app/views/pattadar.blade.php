@extends('layout')

@section('breadcrumb')
<li><a href="/districts">Home</a></li>	
<li><a href="/districts/{{{$district->id}}}">{{{$district->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}">{{{$subdiv->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}">{{{$circle->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}">{{{$mouza->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}">Lot - {{{$lot->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}">{{{$village->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}">Detail {{{$detail->sl}}}</a></li>
<li>{{{$pattadar->name}}}</li>
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Edit Land Owner</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}/pattadars/{{{$pattadar->id}}}" method="POST">
								<div class="form-group">
									<label for="sl" class="col-sm-6 control-label">Sl. No.</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="sl" name="sl" placeholder="Sl. No." tabindex="1" value="{{{$pattadar->sl}}}">
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-6 control-label">Name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="name" name="name" placeholder="Name" tabindex="2" value="{{{$pattadar->name}}}">
									</div>
								</div>
								<div class="form-group">
									<label for="relation" class="col-sm-6 control-label">Relation</label>
									<div class="col-sm-6">
										<select type="text" class="form-control" id="relation" name="relation" tabindex="3">
											<option value='S/o' @if ($pattadar->relation=='S/o') selected @endif >
												Son Of
											</option>
											<option value='D/o' @if ($pattadar->relation=='D/o') selected @endif >
												Daughter Of
											</option>
											<option value='W/o' @if ($pattadar->relation=='W/o') selected @endif >
												Wife Of
											</option>
											 
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="gurdianName" class="col-sm-6 control-label">Gurdian Name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="gurdianName" name="gurdianName" placeholder="Gurdian Name" tabindex="4" value="{{{$pattadar->gurdian}}}">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										<button type="submit" class="btn btn-primary btn-block" tabindex="5">SUBMIT</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<form method="POST" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}/pattadars/{{{$pattadar->id}}}/delete">
				<div class="form-group">
					
					<div class="col-sm-offset-3 col-sm-6">
						<input type="password" class="form-control" id="pin" name="pin" placeholder="PIN">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-danger btn-block" tabindex="4">DELETE OWNER</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
</div> 
@stop