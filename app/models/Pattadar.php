<?php



class Pattadar extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pattadars';

	public function detail()
    {
        return $this->belongsTo('Detail');
    }
	
	

}
