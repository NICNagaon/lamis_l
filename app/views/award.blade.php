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
<li>Award {{{$award->sl}}}</li>
@stop

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">List of Posessors</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
						@foreach ($posessors as $posessor)
							<a href="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}/awards/{{{$award->id}}}/posessors/{{{$posessor->id}}}" class="list-group-item">{{{$posessor->sl}}}) {{{$posessor->name}}}<br/>{{{$posessor->relation}}} {{{$posessor->gurdian}}} @if ($posessor->pattadar_sl != null || $posessor->pattadar_sl>0) ({{{$posessor->pattadar_sl}}}) @endif</a>
						@endforeach
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">New Posessor</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}/awards/{{{$award->id}}}/posessors" method="POST">
								<div class="form-group">
									<label for="name" class="col-sm-6 control-label">Sl. No.</label>
									<div class="col-sm-6">
										<input type="number" class="form-control" id="sl" name="sl" placeholder="Sl No" tabindex="1" min=1 required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-6 control-label">Name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="name" name="name" placeholder="Name" tabindex="2" required>
									</div>
								</div>
								<div class="form-group">
									<label for="relation" class="col-sm-6 control-label">Relation</label>
									<div class="col-sm-6">
										<select type="text" class="form-control" id="relation" name="relation" tabindex="3">
											<option value='S/o'>Son Of</option>
											<option value='D/o'>Daughter Of</option>
											<option value='W/o'>Wife Of</option>
											<option value='M/o'>Mother Of</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="gurdianName" class="col-sm-6 control-label">Gurdian Name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="gurdianName" name="gurdianName" placeholder="Gurdian Name" tabindex="4">
									</div>
								</div>
								<div class="form-group">
									<label for="pattadar_sl" class="col-sm-6 control-label">Pattadar Sl. No.</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="pattadar_sl" name="pattadar_sl" placeholder="Pattadar Sl. No." tabindex="5">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										<button type="submit" class="btn btn-primary btn-block" tabindex="6">SUBMIT</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Bank Details</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}/awards/{{{$award->id}}}/bank" method="POST">
								<div class="form-group">
									<label for="relation" class="col-sm-6 control-label">Bank</label>
									<div class="col-sm-6">
										<select type="text" class="form-control" id="bank" name="bank">
											<option value="-1">Select Bank</option>
											@foreach ($banks as $bank)
												<option value="{{{$bank->id}}}" @if ($award->branch_id!=0 && $bank->id == $award->branch->bank->id) selected @endif)>{{{$bank->name}}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="relation" class="col-sm-6 control-label">Branch</label>
									<div class="col-sm-6">
										<select type="text" class="form-control" id="branch" name="branch">
											<option value="-1">Select Branch</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-6 control-label">Account No.</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="accno" name="accno" placeholder="Account No."  required value="{{{$award->acc_no}}}">
									</div>
								</div>
								<div class="form-group">
									<label for="relation" class="col-sm-6 control-label">Account Holder</label>
									<div class="col-sm-6">
										<select type="text" class="form-control" id="holder" name="holder">
											@foreach ($posessors as $posessor)
												<option value="{{{$posessor->id}}}" @if ($posessor->id == $award->acc_holder) selected @endif)>{{{$posessor->name}}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										<button type="submit" class="btn btn-primary btn-block" tabindex="6">SUBMIT</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<form method="POST" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}/awards/{{{$award->id}}}/delete">
				<div class="form-group">
					
					<div class="col-sm-offset-3 col-sm-6">
						<input type="password" class="form-control" id="pin" name="pin" placeholder="PIN">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-danger btn-block" tabindex="4">DELETE AWARD</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="list-group">
					@if($messages!=null)
						@foreach ($messages->all() as $message)
							<div class="alert alert-error alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>ERROR!</strong> {{{$message}}}
							</div>
						@endforeach
					@endif
					<form class="form-horizontal" action="/districts/{{{$district->id}}}/subdivs/{{{$subdiv->id}}}/circles/{{{$circle->id}}}/mouzas/{{{$mouza->id}}}/lots/{{{$lot->id}}}/villages/{{{$village->id}}}/details/{{{$detail->id}}}/awards/{{{$award->id}}}" method="POST">
						<div class="form-group">
							<label for="daag" class="col-sm-4 control-label">Daag</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="daag" name="daag" placeholder="Daag No." tabindex="5" value="{{{$award->daag}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="pattaType" class="col-sm-4 control-label">Patta Type</label>
							<div class="col-sm-8">
								<select class="form-control" id="pattaType" name="pattaType" tabindex="6">
									<option value='PP'  @if ($award->patta_type=='PP') selected @endif >PP</option>
									<option value='AP'  @if ($award->patta_type=='AP') selected @endif >AP</option>
									<option value='GL'  @if ($award->patta_type=='GL') selected @endif >GL</option>
									<option value='FS'  @if ($award->patta_type=='FS') selected @endif >FS</option>
									<option value='BBP'  @if ($award->patta_type=='BBP') selected @endif >BBP</option>
									<option value='NK'  @if ($award->patta_type=='BBP') selected @endif >NK</option>
									<option value='Lakheraj'  @if ($award->patta_type=='BBP') selected @endif >Lakheraj</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="pattaNo" class="col-sm-4 control-label">Patta No.</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="pattaNo" name="pattaNo" placeholder="Patta No." tabindex="7"value="{{{$award->patta_no}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="landClass" class="col-sm-4 control-label">Land Class</label>
							<div class="col-sm-8">
								<select class="form-control" id="landClass" name="landClass" tabindex="8">
									@foreach ($village->rates as $rate)
										<option value='{{{$rate->name}}}'  @if ($award->land_class==$rate->name) selected @endif >{{{$rate->name}}}</option>
									@endforeach								 
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="pattaNo" class="col-sm-4 control-label">Area</label>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="bigha" name="bigha" placeholder="Bigha" tabindex="9" value="{{{$award->bigha}}}" >								
							</div>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="katha" name="katha" placeholder="Katha" tabindex="10" value="{{{$award->katha}}}" min="0" max="4">
							</div>
							<div class="col-sm-4">
								<input type="number" step="any" class="form-control" id="lecha" name="lecha" placeholder="Lecha" tabindex="11" value="{{{$award->lecha}}}" min="0" max="19.9999">
							</div>
						</div>
						<div class="form-group">
							<label for="baad" class="col-sm-4 control-label">Premium Baad</label>
							<div class="col-sm-8">
								<input type="decimal" class="form-control" id="baad" name="baad" placeholder="Premium Baad" tabindex="12" value="{{{$award->baad}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="zirat" class="col-sm-4 control-label">Value of Zirat</label>
							<div class="col-sm-8">
								<input type="decimal" class="form-control" id="zirat" name="zirat" placeholder="Value of Zirat" tabindex="13" value="{{{$award->zirat}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="revenue" class="col-sm-4 control-label">25 years' Revenue</label>
							<div class="col-sm-8">
								<input type="decimal" class="form-control" id="revenue" name="revenue" placeholder="25 years' Revenue" tabindex="14" value="{{{$award->rev_25}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="building" class="col-sm-4 control-label">Value of Building</label>
							<div class="col-sm-8">
								<input type="decimal" class="form-control" id="building" name="building" placeholder="Value of Building" tabindex="15" value="{{{$award->building_value}}}">
							</div>
						</div>
						<div class="form-group">
							<label for="remarks" class="col-sm-4 control-label">Remarks</label>
							<div class="col-sm-8">
								<textarea  class="form-control" id="remarks" name="remarks" placeholder="Remarks" tabindex="16" rows="3" value="{{{$award->remarks}}}"> 
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="dremarks" class="col-sm-4 control-label">Draft Remarks</label>
							<div class="col-sm-8">
								<textarea  class="form-control" id="dremarks" name="dremarks" placeholder="Draft Remarks" tabindex="16" rows="3" value="{{{$award->draft_remark}}}"> 
								</textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<div class="checkbox">
									<label>
									  <input type="checkbox" id="disputed" name="disputed" tabindex="17" @if ($award->disputed) checked @endif > Distputed
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-primary btn-block" tabindex="18" >SUBMIT</button>
							</div>
						</div>
						<div class="form-group">
							<label for="awd_sl" class="col-sm-4 control-label">Award Serial</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="awd_sl" name="awd_sl" placeholder="Award Serial" value="{{{$award->sl}}}">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div> 
<script>
$(document).ready(function(){
	$( "#bank" ).change(function() {
		$.getJSON( "/banks/"+$( "#bank" ).val()+"/branches" )
		.done(function( json ) {
			var html = "";
			for(var i =0;i<json.length;i++)
			{
				var selected="";
				if(json[i].id=={{{$award->branch_id}}})
					selected="selected";
				html = html+"<option value=\""+json[i].id+"\" "+selected+">"+json[i].name+"</option>";
			}
			$("#branch").html(html);
		})
		.fail(function( jqxhr, textStatus, error ) {
			var err = textStatus + ", " + error;
			alert( "Request Failed: " + err );
		});
	});
});
</script>
@stop