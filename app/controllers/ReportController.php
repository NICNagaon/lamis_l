<?php

class ReportController extends BaseController {
	
	public function showDetails($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('details',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	
	public function showDraftAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('draft',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	public function showFinalAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('final',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	public function showDisputedAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('disputed',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	public function showHandover($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('handover',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	public function showApr($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('apr',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	public function showAdvApr($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('adv_apr',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	public function draftfwd($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		return View::make('draftfwd',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'scheme'=>$scheme));
	}
	public function showEstimate($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$scheme		= Property::find(1)->scheme;
		$landClass	= array();
		
		$land = array('b'=>0,'k'=>0,'l'=>0);
		$total_after_baad = 0;
		$baad	 = 0;
		$factor  = $village->factor;
		$zirat = 0;
		$building = 0;
		$factoredValue =0;
		$total = 0;
		$solatium = 0 ;
		$compensation =0;
		$grandTotal = 0;
		$rev = 0;
		$est =0;
		$cont = 0;
		$rateE = 0;
		$rateC = 0;
		$patta = array();
		foreach($village->rates as $rate)
		{
			$landClass[$rate->name]= array('name'=>$rate->name,'rate'=>$rate->bigha,'area'=>array('b'=>0,'k'=>0,'l'=>0),'value'=>0);
			
			
		}
		foreach($village->details as $detail)
		{
			foreach($detail->awards as $award)
			{
				$landClass[$award->land_class]['area']['l'] = $landClass[$award->land_class]['area']['l'] + $award->lecha;
				while($landClass[$award->land_class]['area']['l']>=20)
				{
					$landClass[$award->land_class]['area']['k'] = $landClass[$award->land_class]['area']['k']+1;
					$landClass[$award->land_class]['area']['l'] = $landClass[$award->land_class]['area']['l']-20;
				}
				$landClass[$award->land_class]['area']['k'] = $landClass[$award->land_class]['area']['k'] + $award->katha;
				if($landClass[$award->land_class]['area']['k']>=5)
				{
					$landClass[$award->land_class]['area']['b'] = $landClass[$award->land_class]['area']['b']+floor($landClass[$award->land_class]['area']['k']/5);
					$landClass[$award->land_class]['area']['k'] = $landClass[$award->land_class]['area']['k']%5;
				}
				$landClass[$award->land_class]['area']['b'] = $landClass[$award->land_class]['area']['b'] + $award->bigha;
				
				$land['l'] = $land['l'] + $award->lecha;
				if($land['l']>=20)
				{
					$land['k'] = $land['k']+floor($land['l']/20);
					$land['l'] = $land['l']%20;
				}
				$land['k'] = $land['k'] + $award->katha;
				if($land['k']>=5)
				{
					$land['b'] = $land['b']+floor($land['k']/5);
					$land['k'] = $land['k']%5;
				}
				$land['b'] = $land['b'] + $award->bigha;
				
				$landClass[$award->land_class]['value'] = $landClass[$award->land_class]['value'] + ((($award->lecha/100)+($award->katha/5) + $award->bigha)*$award->rate);
				
				if (array_key_exists($award->patta_type, $patta)) 
				{
					if(!array_key_exists($award->patta_no, $patta[$award->patta_type]['nos']))
					$patta[$award->patta_type]['nos'][$award->patta_no]=$award->patta_no;
				}
				else
				{
					$patta[$award->patta_type]=array('type'=>$award->patta_type,'nos'=>array($award->patta_no=>$award->patta_no));
					//array_push($patta[$award->patta_type]['nos'],$award->patta_no);
				}
				if($award->patta_type == 'AP')
					$baad = $baad + $award->baad;
				
				$total_after_baad = $total_after_baad + ((($award->lecha/100)+($award->katha/5) + $award->bigha)*$award->rate) - $award->baad;
				
				$factoredValue = $factoredValue + $award->factored_value;
				
				$zirat = $zirat+$award->zirat;
				
				$building = $building+$award->building_value;
				
				$total = $total+$award->total;
				
				$solatium = $solatium + $award->solatium;
				
				$compensation = $compensation+$award->additional_market_value;
				
				$grandTotal = $grandTotal + $award->grand_total;
				
				$rev = $rev + $award->rev_25;
				
				$est = $est + $award->establishment;
				
				$cont = $cont + $award->contingency;
				
			}
		}
		
		//$data		= array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village);
		
		if($grandTotal<=500000)
		{
			$est 	= .18*$grandTotal;			
			$cont	= .07*$grandTotal;
			$rateE	= 18;
			$rateC	= 7;
		}
		else if($grandTotal<=1500000)
		{
			$est 	= .15*$grandTotal;
			$cont	= .05*$grandTotal;
			$rateE	= 15;
			$rateC	= 5;
		}
		else if($grandTotal<=5000000)
		{
			$est 	= .12*$grandTotal;
			$cont	= .03*$grandTotal;
			$rateE	= 12;
			$rateC	= 3;
		}
		else if($grandTotal<=10000000)
		{
			$est 	= .08*$grandTotal;
			$cont	= .02*$grandTotal;
			$rateE	= 8;
			$rateC	= 2;
		}
		else 
		{
			$est 	= .05*$grandTotal;
			$cont	= .01*$grandTotal;
			$rateE	= 5;
			$rateC	= 1;
		}
		
		$village->dc_revenue_amt 	= round($rev,2,PHP_ROUND_HALF_UP);
		$village->dc_est_amt		= $est;
		$village->dc_est_rate		= $rateE;
		$village->dc_cont_amt		= $cont;
		$village->dc_cont_rate		= $rateC;
		$village->dc_baad_amt		= $baad;
		$village->save();
		return View::make('estimate',array(	'district'=>$district,
											'subdiv'=>$subdiv,
											'circle'=>$circle,
											'mouza'=>$mouza,
											'lot'=>$lot,
											'village'=>$village,
											'scheme'=>$scheme,
											'area'=>$land,
											'lands'=>$landClass,
											'total_after_baad'=>$total_after_baad,
											'baad'=>$baad,
											'factor'=>$factor,											
											'zirat'=>$zirat,
											'building'=>$building,
											'factoredValue'=>$factoredValue,
											'total'=>$total,
											'solatium'=>$solatium,
											'compensation'=>$compensation,
											'grandTotal'=>round($grandTotal,0,PHP_ROUND_HALF_UP),
											'rev'=>round($rev,2,PHP_ROUND_HALF_UP),
											'est'=>round($est,0,PHP_ROUND_HALF_UP),
											'cont'=>round($cont,0,PHP_ROUND_HALF_UP),
											'rateE'=>$rateE,
											'rateC'=>$rateC,
											'pattas'=>$patta,
											'final_total'=>round($grandTotal,0,PHP_ROUND_HALF_UP)+round($rev,0,PHP_ROUND_HALF_UP)+$baad +round($est,0,PHP_ROUND_HALF_UP)+round($cont,0,PHP_ROUND_HALF_UP),
											'final_total_words'=>$this->convert_number_to_words(round($grandTotal,0,PHP_ROUND_HALF_UP)+round($rev,0,PHP_ROUND_HALF_UP)+$baad +round($est,0,PHP_ROUND_HALF_UP)+round($cont,0,PHP_ROUND_HALF_UP))));
	}
	
	public function convert_number_to_words($number) {

		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		   $words = array('0' => '', '1' => 'One', '2' => 'Two',
			'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
			'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
			'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
			'13' => 'Thirteen', '14' => 'Fourteen',
			'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
			'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
			'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
			'60' => 'Sixty', '70' => 'Seventy',
			'80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
			 $divider = ($i == 2) ? 10 : 100;
			 $number = floor($no % $divider);
			 $no = floor($no / $divider);
			 $i += ($divider == 10) ? 1 : 2;
			 if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number] .
					" " . $digits[$counter] . $plural . " " . $hundred
					:
					$words[floor($number / 10) * 10]
					. " " . $words[$number % 10] . " "
					. $digits[$counter] . $plural . " " . $hundred;
			 } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
			$words[$point / 10] . " " . 
				  $words[$point = $point % 10] : '';
		  return array('rupees'=>$result, 'paise'=>$points );

		return $string;
	}
}