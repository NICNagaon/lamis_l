<?php



class Subdiv extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subdivs';

	public function district()
    {
        return $this->belongsTo('District');
    }
	
	public function circles()
    {
        return $this->hasMany('Circle');
    }
}
