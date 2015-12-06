<?php

class AwardController extends BaseController {

	

	public function showAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$detail		= Detail::find($detailId);		
		$award		= Award::find($awardId);
		$posessors	= $award->posessors;
		return View::make('award',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'posessors'=>$posessors,'award'=>$award,'messages'=>null));
		//return $subdivs->toArray();
	}
	
	
	
	
	
	public function saveAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$award				= new Award;
		$award->sl			= Award::whereRaw('detail_id in (select id from details where village_id ='.$villageId.')')->count() +1;		
		$detail->awards()->save($award);
		$pattadars			= $detail->pattadars;
		$awards				= $detail->awards;		
		return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'awards'=>$awards,'pattadars'=>$pattadars));		
	}
	/*public function insertAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardSl)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot ::find($lotId);	
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);
		$awards 			= $village->awards->where('sl','>',$awardSl);
		foreach($awards as $a)
		{
			$a->sl = a->sl+1;
			$a->save();
		}
		$award				= new Award;
		$award->sl			= $awardSl;		
		$detail->awards()->save($award);
		$pattadars			= $detail->pattadars;
		$awards				= $detail->awards;		
		return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'awards'=>$awards,'pattadars'=>$pattadars));		
	}*/
	public function updateAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardId)
	{
		$district 			= District::find($distId);
		$subdiv 			= Subdiv::find($subdivId);
		$circle				= Circle::find($circleId);
		$mouza				= Mouza::find($mouzaId);
		$lot				= Lot::find($lotId);
		$village			= Village::find($villageId);
		$detail				= Detail::find($detailId);		
		$award				= Award::find($awardId);
		$award->sl			= Input::get('awd_sl');
		$award->daag		= Input::get('daag');
		$award->patta_type	= Input::get('pattaType');
		$award->patta_no	= Input::get('pattaNo');
		$award->land_class	= Input::get('landClass');		
		$award->bigha		= Input::get('bigha');
		$award->katha		= Input::get('katha');
		$award->lecha		= Input::get('lecha');
		$award->zirat		= Input::get('zirat');
		$award->baad		= Input::get('baad');
		$award->rev_25		= Input::get('revenue');
		$award->building_value	= Input::get('building');
		$award->remarks		= Input::get('remarks');
		$award->disputed	= Input::get('disputed');
		$award->rate		= Rate::where('village_id','=',$villageId)->where('name','=',Input::get('landClass'))->firstOrFail()->bigha;
		$award->land_value	= ($award->bigha + ($award->katha/5) + ($award->lecha/100))*$award->rate;
		$value_wo_baad		= $award->land_value-$award->baad;
		$award->factored_value	= $village->factor *$value_wo_baad;
		$award->total		= $award->zirat+$award->factored_value+$award->building_value;
		$award->solatium	= $award->total;
		$award->additional_market_value = .12*$value_wo_baad;
		$award->grand_total	= $award->total+$award->solatium+$award->additional_market_value;
		if($award->grand_total<=500000)
		{
			$award->establishment 	= .18*$award->grand_total;
			$award->contingency		= .07*$award->grand_total;
		}
		else if($award->grand_total<=1500000)
		{
			$award->establishment 	= .15*$award->grand_total;
			$award->contingency		= .05*$award->grand_total;
		}
		else if($award->grand_total<=5000000)
		{
			$award->establishment 	= .12*$award->grand_total;
			$award->contingency		= .03*$award->grand_total;
		}
		else if($award->grand_total<=10000000)
		{
			$award->establishment 	= .08*$award->grand_total;
			$award->contingency		= .02*$award->grand_total;
		}
		else 
		{
			$award->establishment 	= .05*$award->grand_total;
			$award->contingency		= .01*$award->grand_total;
		}
		$validator = Validator::make(
			array(
				'bigha' => Input::get('bigha'),
				'katha' => Input::get('katha'),
				'lecha' => Input::get('lecha')
			),
			array(
				'bigha' => 'required',
				'katha' => 'required|between:0,4',
				'lecha' => 'required|between:0,19.9999'
			)
		);
		if ($validator->passes())
		{
			$award->save();
			$pattadars			= $detail->pattadars;
			$awards				= $detail->awards;		
			return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'awards'=>$awards,'pattadars'=>$pattadars));		
		}
		else
		{
			$messages = $validator->messages();
			$posessors	= $award->posessors;
			return View::make('award',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'posessors'=>$posessors,'award'=>$award,'messages'=>$messages));
		
		}
		
	}
	
	
	public function deleteAward($distId,$subdivId,$circleId,$mouzaId,$lotId,$villageId,$detailId,$awardId)
	{
		$district 	= District::find($distId);
		$subdiv 	= Subdiv::find($subdivId);
		$circle		= Circle::find($circleId);
		$mouza		= Mouza::find($mouzaId);
		$lot		= Lot::find($lotId);
		$village	= Village::find($villageId);
		$detail		= Detail::find($detailId);		
		$award		= Award::find($awardId);
		if(Input::get('pin')==Property::find(1)->pin)
		{
			/*$awards = $village->awards->where('sl','>',$award->sl);
			foreach($awards as $a)
			{
				$a->sl = a->sl-1;
				$a->save();
			}*/
			$award->delete();
		}
		$pattadars			= $detail->pattadars;
		$awards				= $detail->awards;		
		return View::make('detail',array('district'=>$district,'subdiv'=>$subdiv,'circle'=>$circle,'mouza'=>$mouza,'lot'=>$lot,'village'=>$village,'detail'=>$detail,'awards'=>$awards,'pattadars'=>$pattadars));		
	}
}
