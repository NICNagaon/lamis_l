<?php



class Circle extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'circles';

	public function subdiv()
    {
        return $this->belongsTo('Subdiv');
    }
	
	public function mouzas()
    {
        return $this->hasMany('Mouza');
    }

}
