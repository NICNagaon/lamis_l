<?php

class MouzaController extends BaseController {

	

	public function showMouza($distId,$subdivId,$circleId,$mouzaId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lots		= $mouza->lots;
		return View::make('lot',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lots'=>$lots));
		//return $subdivs->toArray();
	}
	
	public function saveMouza($distId,$subdivId,$circleId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= Circle::find($circleId);
		$mouza					= new Mouza;
		$mouza->name 			= Input::get('name');
		$mouza->name_local 		= Input::get('nameLocal');
		$circle->mouzas()->save($mouza);
		$mouzas					= $circle->mouzas;
		return View::make('mouza',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouzas'=>$mouzas));
	}
	
	public function updateMouza($distId,$subdivId,$circleId,$mouzaId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= Circle::find($circleId);
		$mouza					= Mouza::find($mouzaId);
		$mouza->name 			= Input::get('name');
		$mouza->name_local 		= Input::get('nameLocal');
		$mouza->save();
		$mouzas					= $circle->mouzas;
		return View::make('mouza',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouzas'=>$mouzas));
	}
	public function deleteMouza($distId,$subdivId,$circleId,$mouzaId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($id);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$mouza->delete();
		$mouzas		= $circle->mouzas;
		return View::make('mouza',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouzas'=>$mouzas));
	}
}
