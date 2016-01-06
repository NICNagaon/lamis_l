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
	public function branch()
    {
        return $this->belongsTo('Branch');
    }
	public function posessors()
	{
		return $this->hasMany('Posessor');
	}
	public function accHolder()
    {
        return $this->belongsTo('Posessor','acc_holder');
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
