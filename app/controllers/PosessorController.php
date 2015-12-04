<?php

class PosessorController extends BaseController {

	

	public function showPosessor($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardId,$posessorId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$detail		= Detail::find($detailId);
		$award		= Award::find($awardId);
		$posessor	= Posessor::find($posessorId);
		
		return View::make('posessor',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'award'=>$award,'posessor'=>$posessor,'pin'=>Property::find(1)->pin));
		//return $subdivs->toArray();
	}
	
	
	
	
	
	public function savePosessor($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$award				= Award::find($awardId);
		$posessor			= new Posessor;
		$posessor->sl		= Input::get('sl');
		$posessor->name		= Input::get('name');
		$posessor->relation	= Input::get('relation');
		$posessor->gurdian	= Input::get('gurdianName');
		$posessor->pattadar_sl	= Input::get('pattadar_sl');
		$award->posessors()->save($posessor);
		
		$posessors			= $detail->posessors;
		
		return View::make('award',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'posessors'=>$posessors,'award'=>$award,'messages'=>null));		
	}
	
	public function updatePosessor($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardId,$posessorId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$award				= Award::find($awardId);
		$posessor			= Posessor::find($posessorId);
		$posessor->sl		= Input::get('sl');
		$posessor->name		= Input::get('name');
		$posessor->relation	= Input::get('relation');
		$posessor->gurdian	= Input::get('gurdianName');
		$posessor->pattadar_sl	= Input::get('pattadar_sl');
		$posessor->save();
		
		$posessors			= $award->posessors;
		
		return View::make('award',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'posessors'=>$posessors,'award'=>$award,'messages'=>null));		
	}
	
	public function deletePosessor($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardId,$posessorId)
	{
		
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$award				= Award::find($awardId);
		$posessor			= Posessor::find($posessorId);
		if(Input::get('pin')==Property::find(1)->pin)
			$posessor->delete();
		
		$posessors			= $award->posessors;
		//return $posessors->toArray();
		return View::make('award',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'posessors'=>$posessors,'award'=>$award,'messages'=>null));		
	}
}
