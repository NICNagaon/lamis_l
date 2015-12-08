<?php



class Detail extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'details';

	public function village()
    {
        return $this->belongsTo('Village');
    }
	
	public function pattadars()
	{
		return $this->hasMany('Pattadar')->orderBy('sl');
	}
	
	public function awards()
	{
		return $this->hasMany('Award')->orderBy('sl');
	}
	
	public function posessors()
    {
        return $this->hasManyThrough('Posessor', 'Award')->orderBy('award_id')->orderBy('id');
    }
	public static function boot()
    {
        parent::boot();

        Detail::deleting(function($detail)
		{
				
				$detail->pattadars()->delete();
				$detail->posessors()->delete();
				$detail->awards()->delete();
				DB::statement("UPDATE details SET sl=sl-1 WHERE village_id=".$detail->village->id." and sl>".$detail->sl);
				//return parent::delete();
		});
    }
}
