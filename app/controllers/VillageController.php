<?php

class VillageController extends BaseController {

	

	public function showVillage($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$rates		= $village->rates;
		$details	= $village->details;
		
		return View::make('villageDetails',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'rates'=>$rates,'details'=>$details));
		//return $subdivs->toArray();
	}
	
	public function saveVillage($distId,$subdivId,$circleId,$mouzaId,$lotId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= Circle::find($circleId);
		$mouza					= Mouza::find($mouzaId);
		$lot					= Lot::find($lotId);
		$village				= new Village;
		$village->name 			= Input::get('name');
		$village->name_local	= Input::get('nameLocal');
		$village->factor		= Input::get('factor');
		$village->la_case		= Input::get('lacase');
		$village->chainage_from	= Input::get('cFrom');
		$village->chainage_to	= Input::get('cTo');
		$lot->villages()->save($village);
		$villages				= $lot->villages;
		return View::make('village',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'villages'=>$villages));
	}
	
	public function updateVillage($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= Circle::find($circleId);
		$mouza					= Mouza::find($mouzaId);
		$lot					= Lot ::find($lotId);
		$village				= Village::find($villageId);
		$village->name 			= Input::get('name');
		$village->name_local 	= Input::get('nameLocal');
		if($village->factor!=Input::get('factor'))
		{
			$awards				= $village->awards;
			$village->factor=Input::get('factor');
			foreach($awards as $award)
			{
				$value_wo_baad		= $award->land_value-$award->baad;
				$award->factored_value	= $village->factor *$value_wo_baad;
				$award->total		= $award->zirat+$award->factored_value+$award->building_value;
				$award->solatium	= $award->total;
				$award->additional_market_value = .12*$value_wo_baad;
				$award->grand_total	= $award->total+$award->solatium+$award->additional_market_value;
				if($award->grand_total<=500000)
				{
					$award->establishment 	= .18*$award->grand_total;
					$award->contingency		= .07*$award->grand_total;
				}
				else if($award->grand_total<=1500000)
				{
					$award->establishment 	= .15*$award->grand_total;
					$award->contingency		= .05*$award->grand_total;
				}
				else if($award->grand_total<=5000000)
				{
					$award->establishment 	= .12*$award->grand_total;
					$award->contingency		= .03*$award->grand_total;
				}
				else if($award->grand_total<=10000000)
				{
					$award->establishment 	= .08*$award->grand_total;
					$award->contingency		= .02*$award->grand_total;
				}
				else 
				{
					$award->establishment 	= .05*$award->grand_total;
					$award->contingency		= .01*$award->grand_total;
				}
				$award->save();
			}
			//$village->factor		= Input::get('factor');
		}
		$village->la_case		= Input::get('lacase');
		$village->chainage_from	= Input::get('cFrom');
		$village->chainage_to	= Input::get('cTo');
		Log::info('Showing updated rate for village'.$village->name.': '.$village->factor);
		$village->save();
		$villages				= $lot->villages;
		return View::make('village',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'villages'=>$villages));
	}
	public function deleteVillage($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot ::find($lotId);	
		$village	= Village::find($villageId);
		$village->delete();
		$villages				= $lot->villages;
		return View::make('village',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'villages'=>$villages));
	}
	public function saveRate($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$rate 				= new Rate;
		$rate->name			= Input::get('name');
		$rate->name_local	= Input::get('nameLocal');
		$rate->bigha 		= Input::get('bigha');
		$hector				= Input::get('hector');
		if(($hector==null || $hector=='') && !($rate->bigha==null || $rate->bigha==''))
			$rate->hector = $rate->bigha/0.13248;
		$village->rates()->save($rate);
		$rates		= $village->rates;
		$details	= $village->details;		
		return View::make('villageDetails',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'rates'=>$rates,'details'=>$details));		
	}
	
	public function updateRate($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$rateId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$rate 				= Rate::find($rateId);
		$rate->name			= Input::get('name');
		$rate->name_local	= Input::get('nameLocal');
		if($rate->bigha != Input::get('bigha') || 1)
		{
			$rate->bigha 		= Input::get('bigha');
			$awards				= $village->awards;
			
			foreach($awards as $award)
			{
				Log::info('Log message For Rate Update', array('award' => $award->id,'rate'=>$rate->id,'land_class'=>$award->land_class,'rate-name'=>$rate->name));
				if($award->land_class == $rate->name)
				{
					Log::info('Same hence update');
					$award->rate		= $rate->bigha;
					$award->land_value	= ($award->bigha + ($award->katha/5) + ($award->lecha/100))*$award->rate;
					$value_wo_baad		= $award->land_value-$award->baad;
					$award->factored_value	= $village->factor *$value_wo_baad;
					$award->total		= $award->zirat+$award->factored_value+$award->building_value;
					$award->solatium	= $award->total;
					$award->additional_market_value = .12*$value_wo_baad;
					$award->grand_total	= $award->total+$award->solatium+$award->additional_market_value;
					if($award->grand_total<=500000)
					{
						$award->establishment 	= .18*$award->grand_total;
						$award->contingency		= .07*$award->grand_total;
					}
					else if($award->grand_total<=1500000)
					{
						$award->establishment 	= .15*$award->grand_total;
						$award->contingency		= .05*$award->grand_total;
					}
					else if($award->grand_total<=5000000)
					{
						$award->establishment 	= .12*$award->grand_total;
						$award->contingency		= .03*$award->grand_total;
					}
					else if($award->grand_total<=10000000)
					{
						$award->establishment 	= .08*$award->grand_total;
						$award->contingency		= .02*$award->grand_total;
					}
					else 
					{
						$award->establishment 	= .05*$award->grand_total;
						$award->contingency		= .01*$award->grand_total;
					}
					$award->save();
				}
			}
		}
		$hector		= Input::get('hector');		
		$rate->save();
		$rates		= $village->rates;
		$details	= $village->details;		
		return View::make('villageDetails',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'rates'=>$rates,'details'=>$details));		
	}
	
	public function showRate($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$rateId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$rate		= Rate::find($rateId);
		//$details	= $village->details;
		
		return View::make('rate',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'rate'=>$rate));
		//return $subdivs->toArray();
	}
	
}
