<?php

class ReportController extends BaseController {
	
	public function showDetails($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$data		= array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village);
		$excel = App::make('excel');
		//set_time_limit(3600000);
		/*Excel::create('New file', function($excel) use ($data) {

			$excel->sheet('New sheet', function($sheet) use ($data){

				$sheet->loadView('details',$data);

			});
		})->export('xls');*/
		


		return View::make('details',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village));
	}
}