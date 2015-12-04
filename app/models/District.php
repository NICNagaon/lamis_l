<?php



class District extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'districts';

	public function subdivs()
    {
        return $this->hasMany('Subdiv');
    }

}
