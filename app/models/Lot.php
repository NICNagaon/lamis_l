<?php



class Lot extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lots';

	public function mouza()
    {
        return $this->hasOne('Mouza');
    }
	
	public function villages()
    {
        return $this->hasMany('Village');
    }

}
