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
		
		@media print {
			thead {
			   display: table-header-group;
			}
			tr {
				page-break-inside: avoid;
			}
			tr.total {
				page-break-before: avoid;
			}
		}
		</style>
	</head>
	<body>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="23">
						Details Report of Land Aquisition under {{{$scheme}}}<br/>
						in District: {{{$district->name}}}  Sub-Division: {{{$subdiv->name}}} Revenue Circle: {{{$circle->name}}} Mouza: {{{$mouza->name}}} Village:{{{$village->name}}}<br/>
						with L.A. Case No. {{{$village->la_case}}}<br/>
						Chainage From {{{$village->chainage_from}}} km - Chainage To {{{$village->chainage_to}}} km
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
					<th colspan="4">Area</th>					
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
					<th rowspan="2">Revenue <br/>of <br/>25 years</th>
					<th rowspan="2">Remarks</th>
				</tr>
				<tr>
					<th>B</th>
					<th>K</th>
					<th>L</th>
					<th>Hector</th>
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
					<th>23</th>
				</tr>
			</thead>
			<tbody>
				{{--*/
					$daag=0;
					$bigha=0;
					$katha=0;
					$lecha=0;
					$baad=0;
					$land_value=0;
					$factored_value=0;
					$zirat=0;
					$building_value=0;
					$total=0;
					$solatium=0;
					$additional_market_value=0;
					$grand_total=0;
					$rev_25=0;
					
					$daagT=0;
					$bighaT=0;
					$kathaT=0;
					$lechaT=0;
					$baadT=0;
					$land_valueT=0;
					$factored_valueT=0;
					$ziratT=0;
					$building_valueT=0;
					$totalT=0;
					$solatiumT=0;
					$additional_market_valueT=0;
					$grand_totalT=0;
					$rev_25T=0;
					/*--}}
				@foreach ($village->details as $detail)
					{{--*/$k=1;//$rowspn=$detail->awards->count()+DB::table('awards')->select(DB::raw('distinct daag,patta_type,patta_no'))->where('detail_id', '=', $detail->id)->count();
						$rowspn=$detail->awards->count();
					/*--}}
					@foreach ($detail->awards as $award)
					@if($daag!=$award->daag && $daag!=0)
					
						<tr class="total">
							<td style="text-align:right;" colspan="4">Total of Daag</td>
							<td style="text-align:right;">{{{$daag}}}</td>
							<td style="text-align:right;"></td>
							<td style="text-align:right;"></td>
							<td style="text-align:right;">{{{$bigha}}}</td>
							<td style="text-align:right;">{{{$katha}}}</td>
							<td style="text-align:right;">{{{round($lecha,2,PHP_ROUND_HALF_UP)}}}</td>
							{{--*/$hectare = 0.0013379716*(100*$bigha+20*$katha+round($lecha,2,PHP_ROUND_HALF_UP));/*--}}
							<td style="text-align:right;">{{{$hectare}}}</td>
							<td style="text-align:right;"></td>												
							<td style="text-align:right;">{{{round($land_value,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($baad,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($factored_value,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($zirat,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($building_value,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($total,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($solatium,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($additional_market_value,2,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($grand_total,0,PHP_ROUND_HALF_UP)}}}</td>
							<td style="text-align:right;">{{{round($rev_25,2,PHP_ROUND_HALF_UP)}}}</td>
							<td></td>
						</tr>
					{{--*/$bigha=0;$katha=0;$lecha=0;$baad=0;$land_value=0;$factored_value=0;$zirat=0;$building_value=0;$total=0;$solatium=0;$additional_market_value=0;$grand_total=0;$rev_25=0;/*--}}
					@endif
					<tr>
						@if ($k==1)
						<td rowspan="{{{$rowspn}}}"  style="text-align:center;">
							
							{{{$detail->sl}}}
						</td>
						
						<td rowspan="{{{$rowspn}}}">
							
							@foreach ($detail->pattadars as $pattadar)
								{{{$pattadar->sl}}}){{{$pattadar->name}}} @if ($pattadar->gurdian != null && $pattadar->gurdian!=" ") {{{$pattadar->relation}}} {{{$pattadar->gurdian}}} @endif<br/>
								
							@endforeach
						</td>
						@endif
						<td  style="text-align:center;">{{{$award->sl}}}</td>
						<td>
							
							@foreach ($award->posessors as $posessor)
								{{{$posessor->sl}}}){{{$posessor->name}}} @if ($posessor->gurdian != null && $posessor->gurdian!=" ") {{{$posessor->relation}}} {{{$posessor->gurdian}}} @endif @if ($posessor->pattadar_sl != null && $posessor->pattadar_sl>0) ({{{$posessor->pattadar_sl}}}) @endif<br/>
								
							@endforeach
						</td>
						<td>{{{$award->daag}}}</td>
							{{--*/$daag = $award->daag/*--}}
						<td>{{{$award->patta_type}}}-{{{$award->patta_no}}}</td>
						<td>{{{$award->land_class}}}</td>
						<td style="text-align:right;">{{{$award->bigha}}}</td>
						<td style="text-align:right;">{{{$award->katha}}}</td>
						<td style="text-align:right;">{{{$award->lecha}}}</td>
						{{--*/
							$lecha = $lecha+$award->lecha;
							if($lecha>=20)
							{
								
								while($lecha>=20)
								{
									$katha=$katha+1;
									$lecha = $lecha-20;
								}
							}
							$katha = $katha+$award->katha;
							if($katha>=5)
							{
								$bigha=$bigha+floor($katha/5);
								$katha=$katha%5;
							}
							$bigha = $bigha+$award->bigha;
							
							$lechaT = $lechaT+$award->lecha;
							if($lechaT>=20)
							{
								while($lechaT>=20)
								{
									$kathaT=$kathaT+1;
									$lechaT = $lechaT-20;
								}
							}
							$kathaT = $kathaT+$award->katha;
							if($kathaT>=5)
							{
								$bighaT=$bighaT+floor($kathaT/5);
								$kathaT=$kathaT%5;
							}
							$bighaT = $bighaT+$award->bigha;
							/*--}}
						{{--*/$hectare1 = 0.0013379716*(100*$award->bigha+20*$award->katha+round($award->lecha,2,PHP_ROUND_HALF_UP));/*--}}
						<td style="text-align:right;">{{{$hectare1}}}</td>
						<td style="text-align:right;">{{{$award->rate}}}</td>												
						<td style="text-align:right;">{{{$award->land_value}}}</td>
							{{--*/
								$land_value = $land_value+$award->land_value;
								$land_valueT = $land_valueT+$award->land_value;
								/*--}}
						<td style="text-align:right;">{{{$award->baad}}}</td>
							{{--*/
								$baad = $baad+$award->baad;
								$baadT = $baadT+$award->baad;
								/*--}}
						<td style="text-align:right;">{{{$award->factored_value}}}</td>
							{{--*/
								$factored_value = $factored_value+$award->factored_value;
								$factored_valueT = $factored_valueT+$award->factored_value;
								/*--}}
						<td style="text-align:right;">{{{$award->zirat}}}</td>
							{{--*/
								$zirat = $zirat+$award->zirat;
								$ziratT = $ziratT+$award->zirat;
								/*--}}
						<td style="text-align:right;">{{{$award->building_value}}}</td>
							{{--*/
								$building_value = $building_value+$award->building_value;
								$building_valueT = $building_valueT+$award->building_value;
								/*--}}
						<td style="text-align:right;">{{{$award->total}}}</td>
							{{--*/
								$total = $total+$award->total;
								$totalT = $totalT+$award->total;
								/*--}}
						<td style="text-align:right;">{{{$award->solatium}}}</td>
							{{--*/
								$solatium = $solatium+$award->solatium;
								$solatiumT = $solatiumT+$award->solatium;
								/*--}}
						<td style="text-align:right;">{{{$award->additional_market_value}}}</td>
							{{--*/
								$additional_market_value = $additional_market_value+$award->additional_market_value;
								$additional_market_valueT = $additional_market_valueT+$award->additional_market_value;
								/*--}}
						<td style="text-align:right;">{{{$award->grand_total}}}</td>
							{{--*/
								$grand_total = $grand_total+$award->grand_total;
								$grand_totalT = $grand_totalT+$award->grand_total;
								/*--}}
						<td style="text-align:right;">{{{$award->rev_25}}}</td>
							{{--*/
								$rev_25 = $rev_25+$award->rev_25;
								$rev_25T = $rev_25T+$award->rev_25;
								/*--}}
						<td>{{{$award->remarks}}}</td>
					</tr>
						{{--*/$k=$k+1;/*--}}
						
					@endforeach
					
				@endforeach
				<tr class="total">
					<td style="text-align:right;" colspan="4">Total of Daag</td>
					<td style="text-align:right;">{{{$daag}}}</td>
					<td style="text-align:right;"></td>
					<td style="text-align:right;"></td>
					<td style="text-align:right;">{{{$bigha}}}</td>
					<td style="text-align:right;">{{{$katha}}}</td>
					<td style="text-align:right;">{{{round($lecha,2,PHP_ROUND_HALF_UP)}}}</td>	
					{{--*/$hectare = 0.0013379716*(100*$bigha+20*$katha+round($lecha,2,PHP_ROUND_HALF_UP));/*--}}
					<td style="text-align:right;">{{{$hectare}}}</td>
					<td style="text-align:right;"></td>												
					<td style="text-align:right;">{{{round($land_value,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($baad,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($factored_value,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($zirat,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($building_value,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($total,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($solatium,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($additional_market_value,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($grand_total,0,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($rev_25,2,PHP_ROUND_HALF_UP)}}}</td>
					<td></td>
				</tr>
				<tr class="total" style="font-weight: bold;">
					<td style="text-align:right;" colspan="4">Grand Total </td>
					<td style="text-align:right;"></td>
					<td style="text-align:right;"></td>
					<td style="text-align:right;"></td>
					<td style="text-align:right;">{{{$bighaT}}}</td>
					<td style="text-align:right;">{{{$kathaT}}}</td>
					<td style="text-align:right;">{{{round($lechaT,2,PHP_ROUND_HALF_UP)}}}</td>	
					{{--*/$hectareT = 0.0013379716*(100*$bighaT+20*$kathaT+round($lechaT,2,PHP_ROUND_HALF_UP));/*--}}
					<td style="text-align:right;">{{{$hectareT}}}</td>
					<td style="text-align:right;"></td>												
					<td style="text-align:right;">{{{round($land_valueT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($baadT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($factored_valueT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($ziratT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($building_valueT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($totalT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($solatiumT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($additional_market_valueT,2,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($grand_totalT,0,PHP_ROUND_HALF_UP)}}}</td>
					<td style="text-align:right;">{{{round($rev_25T,2,PHP_ROUND_HALF_UP)}}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</body>
</html>