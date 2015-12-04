<?php

class LotController extends BaseController {

	

	public function showLot($distId,$subdivId,$circleId,$mouzaId,$lotId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$villages	= $lot->villages;
		return View::make('village',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'villages'=>$villages));
		//return $subdivs->toArray();
	}
	
	public function saveLot($distId,$subdivId,$circleId,$mouzaId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= Circle::find($circleId);
		$mouza					= Mouza::find($mouzaId);
		$lot					= new Lot;
		$lot->name 				= Input::get('name');
		$lot->name_local 		= Input::get('nameLocal');
		$mouza->lots()->save($lot);
		$lots					= $mouza->lots;
		return View::make('lot',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lots'=>$lots));
	}
	
	public function updateLot($distId,$subdivId,$circleId,$mouzaId,$lotId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= Circle::find($circleId);
		$mouza					= Mouza::find($mouzaId);
		$lot					= Lot ::find(lotId);
		$lot->name 				= Input::get('name');
		$lot->name_local 		= Input::get('nameLocal');
		$lot->save();
		$lots					= $mouza->lots;
		return View::make('lot',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lots'=>$lots));
	}
	public function deleteLot($distId,$subdivId,$circleId,$mouzaId,$lotId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($id);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot ::find(lotId);		
		$lot->delete();
		$lots		= $mouza->lots;
		return View::make('lot',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lots'=>$lots));
	}
}
