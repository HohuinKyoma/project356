<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $softDelete = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function profile()
	{
		return $this->hasOne('Profile');
	}

	public function code()
	{
		return $this->hasOne('Code');
	}

	public function father()
	{
		return $this->belongsTo('User', 'father_id');
	}

	public function avatar()
	{
		return $this->hasOne('Avatar');
	}

	public function visits()
	{
		return $this->hasMany('Visit', 'visited_id')->orderBy('created_at', 'DESC');
	}

	public function getAvatar($type = 'default'){
    	$name = $this->avatar->name;
    	$extension = $this->avatar->type;
    	$name.= '_'.$type;
    	$url = URL::asset('avatars/'.$name.'.'.$extension);
    	return '<img src="'.$url.'" alt="Avatar de '.$this->profile->nickname.'"/>';
    }

	public function isAdmin()
	{
		if($this->sa) return true;
		else return false;
	}

}