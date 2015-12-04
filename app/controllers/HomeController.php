<?php

class DistrictController extends BaseController {

	

	public function showDistrict()
	{
		$districts = District::all();
		return View::make('district')->withDistricts($districts);
	}

}
