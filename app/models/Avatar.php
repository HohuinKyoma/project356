<?php
class Avatar extends Eloquent {

	protected $softDelete = true;

	public function user()
    {
        return $this->belongsTo('user');
    }
}