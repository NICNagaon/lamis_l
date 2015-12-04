<?php



class Posessor extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posessors';

	public function award()
    {
        return $this->belongsTo('Award');
    }
	
	

}
