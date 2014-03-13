<?php
class Profile extends Eloquent {

	protected $softDelete = true;

	public function user()
    {
        return $this->belongsTo('User');
    }
}