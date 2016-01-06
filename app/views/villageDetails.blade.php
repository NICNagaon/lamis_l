@extends('layout')

@section('breadcrumb')
<li><a href="/districts">Home</a></li>	
<li><a href="/districts/{{{$district->id}}}">{{{$district->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}">{{{$subdiv->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}">{{{$circle->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}">{{{$mouza->name}}}</a></li>
<li><a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}">Lot - {{{$lot->name}}}</a></li>
<li>{{{$village->name}}}</li>
@stop

@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">List of Rates</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
						@foreach ($rates as $rate)
							<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/rates/{{{$rate->id}}}" class="list-group-item">{{{$rate->name}}}<br/>{{{$rate->name_local}}}<br/>Rs.{{{$rate->bigha}}}/- per Bigha<br/>Rs.{{{$rate->hector}}}/- per Hector</a>
						@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">List of Details</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
						@foreach ($details as $detail)
							<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}" class="list-group-item">{{{$detail->sl}}}</a>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">New Rate</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/rates" method="POST">
								<div class="form-group">
									<label for="name" class="col-sm-6 control-label">Land Class</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="name" name="name" placeholder="Land Class" tabindex="1">
									</div>
								</div>
								<div class="form-group">
									<label for="nameLocal" class="col-sm-6 control-label">Land Class in Local Language</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="nameLocal" name="nameLocal" placeholder="Land Class in Local Language" tabindex="2">
									</div>
								</div>
								<div class="form-group">
									<label for="bigha" class="col-sm-6 control-label">Rate per Bigha</label>
									<div class="col-sm-6">
										<input type="decimal" class="form-control" id="bigha" name="bigha" placeholder="Rate per Bigha" tabindex="3">
									</div>
								</div>
								<div class="form-group">
									<label for="hector" class="col-sm-6 control-label">Rate per Hector</label>
									<div class="col-sm-6">
										<input type="decimal" class="form-control" id="hector" name="hector" placeholder="Rate per Hector" tabindex="4">
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
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">New Detail</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details" method="POST">
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-primary btn-block" tabindex="5">ADD DETAIL</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Reports</h3>
				</div>
				<div class="panel-body">
					<div class="list-group">
					
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/detailsReport" class="list-group-item">Details Report</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/estimateReport" class="list-group-item">Estimate Report</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/draftfwd" class="list-group-item">Forwarding of Draft Award</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/draftAward" class="list-group-item">Draft Award Report</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/finalAward" class="list-group-item">Final Award Report</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/disputedAward" class="list-group-item">Final Disputed Award Report</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/handoverReport" class="list-group-item">Handover Report</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/apr" class="list-group-item">APR Report</a>
						<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/advApr" class="list-group-item">Advance APR Report</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Village</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}" method="POST">
						<div class="form-group">
							<label for="name" class="col-sm-6 control-label">Name</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" tabindex="1" value="{{{$village->name}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="nameLocal" class="col-sm-6 control-label">Name in Local Language</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nameLocal" name="nameLocal" placeholder="Name in Local Language" tabindex="2" value="{{{$village->name_local}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="factor" class="col-sm-6 control-label">Multiplication Factor</label>
							<div class="col-sm-6">
								<input type="decimal" class="form-control" id="factor" name="factor" placeholder="Multiplication Factor" tabindex="3" value="{{{$village->factor}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="lacase" class="col-sm-6 control-label">LA Case</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="lacase" name="lacase" placeholder="La Case" tabindex="4" value="{{{$village->la_case}}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-6 control-label">Chainage</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="cFrom" name="cFrom" placeholder="From" tabindex="5" value="{{{$village->chainage_from}}}">
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="cTo" name="cTo" placeholder="To" tabindex="6" value="{{{$village->chainage_to}}}">
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
		
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Issue Cheques</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/cheques" method="POST">
						<div class="form-group">
							<label for="cheque" class="col-sm-6 control-label">Starting Cheque No.</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="cheque" name="cheque" placeholder="Cheque No.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-primary btn-block" tabindex="5">Issue Cheques</button>
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