<?php



class Mouza extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'mouzas';

	public function circle()
    {
        return $this->belongsTo('Circle');
    }
	
	public function lots()
    {
        return $this->hasMany('Lot');
    }

}
