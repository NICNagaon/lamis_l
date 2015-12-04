<?php

class PattadarController extends BaseController {

	

	public function showPattadar($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$pattadarId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$detail		= Detail::find($detailId);
		$pattadar	= Pattadar::find($pattadarId);
		
		return View::make('pattadar',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'pattadar'=>$pattadar));
		//return $subdivs->toArray();
	}
	
	
	
	
	
	public function savePattadar($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$pattadar			= new Pattadar;
		$pattadar->sl		= Input::get('sl');
		$pattadar->name		= Input::get('name');
		$pattadar->relation	= Input::get('relation');
		$pattadar->gurdian	= Input::get('gurdianName');
		$detail->pattadars()->save($pattadar);
		
		$pattadars			= $detail->pattadars;
		$awards				= $detail->awards;
		return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'pattadars'=>$pattadars,'awards'=>$awards));		
	}
	
	public function updatePattadar($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$pattadarId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$pattadar			= Pattadar::find($pattadarId);
		$pattadar->sl		= Input::get('sl');
		$pattadar->name		= Input::get('name');
		$pattadar->relation	= Input::get('relation');
		$pattadar->gurdian	= Input::get('gurdianName');
		$pattadar->save();
		
		$pattadars			= $detail->pattadars;
		$awards				= $detail->awards;
		return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'pattadars'=>$pattadars,'awards'=>$awards));		
	}
	
	public function deletePattadar($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$pattadarId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$pattadar			= Pattadar::find($pattadarId);
		if(Input::get('pin')==Property::find(1)->pin)
			$pattadar->delete();
		
		$pattadars			= $detail->pattadars;
		$awards				= $detail->awards;
		return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'pattadars'=>$pattadars,'awards'=>$awards));		
	}
}
