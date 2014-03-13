<?php
class Visit extends Eloquent {

	protected $softDelete = true;

	public function visitor()
    {
        return $this->belongsTo('User', 'visitor_id');
    }

    public function visited()
    {
        return $this->belongsTo('User', 'visited_id');
    }
}