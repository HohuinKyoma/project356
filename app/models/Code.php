<?php
class Code extends Eloquent {

	protected $softDelete = true;

	public function user()
    {
        return $this->belongsTo('User');
    }
}