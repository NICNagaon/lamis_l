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
		$village->la_case		= Input::get('lacase');
		$village->chainage_from	= Input::get('cFrom');
		$village->chainage_to	= Input::get('cTo');
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
	
}
