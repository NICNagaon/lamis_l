<?php



class Rate extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rates';

	public function village()
    {
        return $this->belongsTo('Village');
    }
	
	

}
