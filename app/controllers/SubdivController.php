<?php

class SubdivController extends BaseController {

	

	public function showSubdiv($distId,$id)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($id);
		$circles	= $subdiv->circles;
		return View::make('circle',array('district'=>$district,'subdiv'=>$subdiv,'circles'=>$circles));
		//return $subdivs->toArray();
	}
	
	public function saveSubdiv($id)
	{
		$district 				= District::find($id);
		$subdiv 				= new Subdiv;
		$subdiv->name 			= Input::get('name');
		$subdiv->name_local 	= Input::get('nameLocal');
		$district->subdivs()->save($subdiv);
		$subdivs 				= $district->subdivs;
		return View::make('subdiv',array('district'=>$district,'subdivs'=>$subdivs));
	}
	
	public function updateSubdiv($distId,$id)
	{
		$district 				= District::find($distId);
		$subdiv 				= Subdiv::find($id);
		$subdiv->name 			= Input::get('name');
		$subdiv->name_local 	= Input::get('nameLocal');
		$subdiv->save();
		$subdivs 				= $district->subdivs;
		return View::make('subdiv',array('district'=>$district,'subdivs'=>$subdivs));
	}
	public function deleteSubdiv($distId,$id)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($id);
		$subdiv->delete();
		$subdivs 	= $district->subdivs;
		return View::make('subdiv',array('district'=>$district,'subdivs'=>$subdivs));
	}
}
