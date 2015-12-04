<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<!-- Bootstrap core CSS -->
		
		<title>Details Report</title>
		<style>
		table{
			vertical-align: middle;
			font-size:.8em;
			border-collapse: collapse;
		}
		table thead tr th{
			text-align:center;
			border: 1px solid black;
		}
		table, td, th{
			
			border: 1px solid black;
		}
		tr {
			page-break-inside: avoid;
		}
		tr.total {
			page-break-before: avoid;
		}
		</style>
	</head>
	<body>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="22">
						Details Report of Land Aquisition under SCHEME_NAME_HERE<br/>
						in {{{$district->name}}} District {{{$subdiv->name}}} Sub-Division {{{$circle->name}}} Revenue Circle {{{$mouza->name}}} Mouza {{{$village->name}}}<br/>
						with L.A. Case No. {{{$village->la_case}}}
					</th>
				</tr>
				<tr>
					<th rowspan="2">Detail<br/>Sl. No.</th>
					<th rowspan="2">Name of Land Owner</th>
					<th rowspan="2">Award<br/>Sl. No.</th>					
					<th rowspan="2">Name of Posessor</th>
					<th rowspan="2">Dag No.</th>
					<th rowspan="2">Patta No.</th>
					<th rowspan="2">Class of Land</th>
					<th colspan="3">Area</th>					
					<th rowspan="2">Rate per Bigha</th>										
					<th rowspan="2">Land value in Rs.</th>
					<th rowspan="2">Premium Baad in Rs.</th>
					<th rowspan="2">Land value <br/>multiplied by a <br/>factor of <br/>{{{$village->factor}}}</th>
					<th rowspan="2">Total Value of Zirat</th>
					<th rowspan="2">Building Value</th>
					<th rowspan="2">Total</th>
					<th rowspan="2">Solatium @ 100%</th>
					<th rowspan="2">Additional <br/>market value <br/>of land <br/>@ 12%</th>
					<th rowspan="2">Total</th>
					<th rowspan="2">Revenue of 25 years</th>
					<th rowspan="2">Remarks</th>
				</tr>
				<tr>
					<th>B</th>
					<th>K</th>
					<th>L</th>
				</tr>
				<tr>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>6</th>
					<th>7</th>
					<th>8</th>
					<th>9</th>
					<th>10</th>
					<th>11</th>
					<th>12</th>
					<th>13</th>
					<th>14</th>
					<th>15</th>
					<th>16</th>
					<th>17</th>
					<th>18</th>
					<th>19</th>
					<th>20</th>
					<th>21</th>
					<th>22</th>
				</tr>
			</thead>
			<tbody>
				{{--*/
					total=array('daag'=>array(
						'daag'=>0,
						'bigha'=>0,
						'katha'=>0,
						'lecha'=>0,
						'baad'=>0,
						'land_value'=>0,
						'factored_value'=>0,
						'zirat'=>0,
						'building_value'=>0,
						'total'=>0,
						'solatium'=>0,
						'additional_market_value'=>0,
						'grand_total'=>0,
						'rev_25'=>0
					),'grand'=>array(
					));
					
					
					
					/*--}}
				@foreach ($village->details as $detail)
					{{--*/$k=1;/*--}}
					@foreach ($detail->awards as $award)
					@if($total('daag')('daag')!=$award->daag && $total('daag')('daag') !=0)
					
						<tr class="total">
							<td style="text-align:right;" colspan="4">Total of Daag</td>
							<td>{{{$total('daag')('daag')}}}</td>
							<td></td>
							<td></td>
							<td style="text-align:right;">{{{$total('daag')('bigha')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('katha')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('lecha')}}}</td>						
							<td style="text-align:right;"></td>												
							<td style="text-align:right;">{{{$total('daag')('land_value')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('lecha')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('factored_value')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('zirat')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('building_value')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('total')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('solatium')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('additional_market_value')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('grand_total')}}}</td>
							<td style="text-align:right;">{{{$total('daag')('rev_25')}}}</td>
							<td></td>
						</tr>
					{{--*/$total('daag')('bigha')=0;$total('daag')('katha')=0;$total('daag')('lecha')=0;$total('daag')('lecha')=0;$total('daag')('land_value')=0;$total('daag')('factored_value')=0;$total('daag')('zirat')=0;$total('daag')('building_value')=0;$total('daag')('total')=0;$total('daag')('solatium')=0;$total('daag')('additional_market_value')=0;$total('daag')('grand_total')=0;$total('daag')('rev_25')=0;/*--}}
					@endif
					<tr>
						@if ($k==1)
						<td rowspan="{{{$detail->awards->count()}}}"  style="text-align:center;">
							
							{{{$detail->sl}}}
						</td>
						
						<td rowspan="{{{$detail->awards->count()}}}">
							
							@foreach ($detail->pattadars as $pattadar)
								{{{$pattadar->sl}}}){{{$pattadar->name}}} {{{$pattadar->relation}}} {{{$pattadar->gurdian}}}<br/>
								
							@endforeach
						</td>
						@endif
						<td  style="text-align:center;">{{{$award->sl}}}</td>
						<td>
							
							@foreach ($award->posessors as $posessor)
								{{{$posessor->sl}}}){{{$posessor->name}}} {{{$posessor->relation}}} {{{$posessor->gurdian}}} @if ($posessor->pattadar_sl != null || $posessor->pattadar_sl>0) ({{{$posessor->pattadar_sl}}}) @endif<br/>
								
							@endforeach
						</td>
						<td>{{{$award->daag}}}</td>
							{{--*/$total('daag')('daag') = $award->daag/*--}}
						<td>{{{$award->patta_type}}}-{{{$award->patta_no}}}</td>
						<td>{{{$award->land_class}}}</td>
						<td style="text-align:right;">{{{$award->bigha}}}</td>
						<td style="text-align:right;">{{{$award->katha}}}</td>
						<td style="text-align:right;">{{{$award->lecha}}}</td>
						{{--*/
							$total('daag')('lecha') = $total('daag')('lecha')+$award->lecha;
							if($total('daag')('lecha')>=20)
							{
								$total('daag')('katha')=$total('daag')('katha')+floor($total('daag')('lecha')/20);
								$total('daag')('lecha') = $total('daag')('lecha')%20;
							}
							$total('daag')('katha') = $total('daag')('katha')+$award->katha;
							if($total('daag')('katha')>=5)
							{
								$total('daag')('bigha')=$total('daag')('bigha')+floor($total('daag')('katha')/5);
								$total('daag')('katha')=$total('daag')('katha')%5;
							}
							$total('daag')('bigha') = $total('daag')('bigha')+$award->bigha;
							
							
							/*--}}
						<td style="text-align:right;">{{{$award->rate}}}</td>												
						<td style="text-align:right;">{{{$award->land_value}}}</td>
							{{--*/
								$total('daag')('land_value') = $total('daag')('land_value')+$award->land_value;
								
								/*--}}
						<td style="text-align:right;">{{{$award->baad}}}</td>
							{{--*/
								$total('daag')('lecha') = $total('daag')('lecha')+$award->baad;
								
								/*--}}
						<td style="text-align:right;">{{{$award->factored_value}}}</td>
							{{--*/
								$total('daag')('factored_value') = $total('daag')('factored_value')+$award->factored_value;
								
								/*--}}
						<td style="text-align:right;">{{{$award->zirat}}}</td>
							{{--*/
								$total('daag')('zirat') = $total('daag')('zirat')+$award->zirat;
								
								/*--}}
						<td style="text-align:right;">{{{$award->building_value}}}</td>
							{{--*/
								$total('daag')('building_value') = $total('daag')('building_value')+$award->building_value;
								
								/*--}}
						<td style="text-align:right;">{{{$award->total}}}</td>
							{{--*/
								$total('daag')('total') = $total('daag')('total')+$award->total;
								
								/*--}}
						<td style="text-align:right;">{{{$award->solatium}}}</td>
							{{--*/
								$total('daag')('solatium') = $total('daag')('solatium')+$award->solatium;
								
								/*--}}
						<td style="text-align:right;">{{{$award->additional_market_value}}}</td>
							{{--*/
								$total('daag')('additional_market_value') = $total('daag')('additional_market_value')+$award->additional_market_value;
								
								/*--}}
						<td style="text-align:right;">{{{$award->grand_total}}}</td>
							{{--*/
								$total('daag')('grand_total') = $total('daag')('grand_total')+$award->grand_total;
								
								/*--}}
						<td style="text-align:right;">{{{$award->rev_25}}}</td>
							{{--*/
								$total('daag')('rev_25') = $total('daag')('rev_25')+$award->rev_25;
								
								/*--}}
						<td>{{{$award->remarks}}}</td>
					</tr>
						{{--*/$k=$k+1;/*--}}
						
					@endforeach
					
				@endforeach
				<tr class="total">
					<td style="text-align:right;" colspan="4">Total of Daag</td>
					<td style="text-align:right;">{{{$total('daag')('daag')}}}</td>
					<td style="text-align:right;"></td>
					<td style="text-align:right;"></td>
					<td style="text-align:right;">{{{$total('daag')('bigha')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('katha')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('lecha')}}}</td>						
					<td style="text-align:right;"></td>												
					<td style="text-align:right;">{{{$total('daag')('land_value')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('lecha')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('factored_value')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('zirat')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('building_value')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('total')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('solatium')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('additional_market_value')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('grand_total')}}}</td>
					<td style="text-align:right;">{{{$total('daag')('rev_25')}}}</td>
					<td></td>
				</tr>
				
			</tbody>
		</table>
	</body>
</html>