<?php

class DetailController extends BaseController {

	

	public function showDetail($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$detail		= Detail::find($detailId);
		$pattadars	= $detail->pattadars;
		$awards		= $detail->awards;
		return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'pattadars'=>$pattadars,'awards'=>$awards));
		//return $subdivs->toArray();
	}
	
	
	
	
	
	public function saveDetail($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= new Detail;
		$detail->sl			= $village->details->count() +1;		
		$village->details()->save($detail);
		$rates				= $village->rates;
		$details			= $village->details;		
		return View::make('villageDetails',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'rates'=>$rates,'details'=>$details));		
	}
	
	public function deleteDetail($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		if(Input::get('pin')==Property::find(1)->pin)
		{
			$detail->delete();
		}
		$rates				= $village->rates;
		$details			= $village->details;		
		return View::make('villageDetails',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'rates'=>$rates,'details'=>$details));		
	}
	public function updateDetail($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$detail->sl			= Input::get('dsl');
		$detail->save();
		$rates				= $village->rates;
		$details			= $village->details;		
		return View::make('villageDetails',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'rates'=>$rates,'details'=>$details));		
	}
}
