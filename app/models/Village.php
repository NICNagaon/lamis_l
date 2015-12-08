<?php



class Village extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'villages';

	public function lot()
    {
        return $this->belongsTo('Lot');
    }
	
	public function rates()
    {
        return $this->hasMany('Rate');
    }
	
	public function details()
    {
        return $this->hasMany('Detail')->orderBy('sl');
		//->orderBy('id')->get()
    }
	
	public function awards()
    {
        return $this->hasManyThrough('Award', 'Detail')->orderBy('sl');
    }

}
