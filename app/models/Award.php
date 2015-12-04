<?php



class Award extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'awards';

	public function detail()
    {
        return $this->belongsTo('Detail');
    }
	
	public function posessors()
	{
		return $this->hasMany('Posessor');
	}
	
	public static function boot()
    {
        parent::boot();

        Award::deleting(function($award)
		{
				$award->posessors()->delete();
				//return parent::delete();
		});
    }

}
