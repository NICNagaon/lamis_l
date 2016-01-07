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
	public function branch()
    {
        return $this->belongsTo('Branch','dc_branch_id');
    }
}
