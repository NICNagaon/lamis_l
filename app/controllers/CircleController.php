<?php

class CircleController extends BaseController {

	

	public function showCircle($distId,$subdivId,$circleId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouzas		= $circle->mouzas;
		return View::make('mouza',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouzas'=>$mouzas));
		//return $subdivs->toArray();
	}
	
	public function saveCircle($distId,$subdivId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= new Circle;
		$circle->name 			= Input::get('name');
		$circle->name_local 	= Input::get('nameLocal');
		$subdiv->circles()->save($circle);
		$circles 				= $subdiv->circles;
		return View::make('circle',array('district'=>$district,'subdiv'=>$subdiv,'circles'=>$circles));
	}
	
	public function updateCircle($distId,$subdivId,$circleId)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($subdivId);
		$circle					= Circle::find($circleId);
		$circle->name 			= Input::get('name');
		$circle->name_local 	= Input::get('nameLocal');
		$circle->save();
		$circles 				= $subdiv->circles;
		return View::make('circle',array('district'=>$district,'subdiv'=>$subdiv,'circles'=>$circles));
	}
	public function deleteSubdiv($distId,$subdivId,$circleId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($id);
		$circle		= Circle::find($circleId);
		$circle->delete();
		$circles 	= $subdiv->circles;
		return View::make('circle',array('district'=>$district,'subdiv'=>$subdiv,'circles'=>$circles));
	}
}
