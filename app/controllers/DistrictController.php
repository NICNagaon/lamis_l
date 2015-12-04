<?php

class DistrictController extends BaseController {

	

	public function listDistricts()
	{
		$districts = District::all();
		return View::make('district')->withDistricts($districts);
	}
	public function showDistrict($id)
	{
		$district = District::find($id);
		$subdivs = $district->subdivs;
		return View::make('subdiv',array('district'=>$district,'subdivs'=>$subdivs));
		//return $subdivs->toArray();
	}
	public function saveDistrict()
	{
		$district = new District;
		$district->name = Input::get('name');
		$district->name_local = Input::get('nameLocal');
		$district->save();
		$districts = District::all();
		return View::make('district')->withDistricts($districts);
	}
	public function updateDistrict($id)
	{
		$district = District::find($id);
		$district->name = Input::get('name');
		$district->name_local = Input::get('nameLocal');
		$district->save();
		$districts = District::all();
		return View::make('district')->withDistricts($districts);
	}
	public function deleteDistrict($id)
	{
		$district = District::find($id);
		
		$district->delete();
		$districts = District::all();
		return View::make('district')->withDistricts($districts);
	}
}
