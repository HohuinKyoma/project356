<?php

/*
|--------------------------------------------------------------------------
| Useful functions to use within the app
|--------------------------------------------------------------------------
|
*/

class Helper {

	/**
	 * Generates a unique code
	 *
	 * @return string
	 */
	public static function code($length) {
	    $limit_one = rand();
	    $limit_two = rand();
	    $code = substr(uniqid(sha1(crypt(md5(rand(min($limit_one, $limit_two), max($limit_one, $limit_two)))))), 0, $length);
    	return $code;
	}

	/**
	 * Create avatar
	 *
	 * @return void
	 */
	public static function createAvatar($file, $array,  $name, $extension) {
		foreach($array as $type => $size)
		{
			$path = public_path().'/avatars/'.$name.'_'.$type.'.'.$extension;
			$img = Image::make($file->getRealPath())->resize(NULL, $size, true)->greyscale()->contrast(20)->save($path);
			list($width, $height) = getimagesize($path);
			if( $width > $size )
			{
				$img->crop( $size,$size,($width - $size) / 2, 0 )->save($path);
			}
		}
	}

	/**
	 * Get how much time has passed since specific date
	 *
	 * @param string
	 * @return string
	 */
	public static function timeAgo($ptime, $ago = true)
	{
		$local = Config::get('app.locale');

		if($ago)
		{
			$etime = time() - $ptime;
		}
		else
		{
			$etime = $ptime;
		}

	    if ($etime < 1)
	    {
	    	if($local == 'en')
	    	{
	    		return '0 seconds';
	    	}
	    	if($local == 'fr')
	    	{
	    		return '0 secondes';
	    	}
	    }

	    if($local == 'fr')
	    {
	   	    $a = array( 12 * 30 * 24 * 60 * 60  =>  'année',
	                30 * 24 * 60 * 60       =>  'mois',
	                24 * 60 * 60            =>  'jour',
	                60 * 60                 =>  'heure',
	                60                      =>  'minute',
	                1                       =>  'seconde'
	                );
	    }

	    foreach ($a as $secs => $str)
	    {
	        $d = $etime / $secs;
	        if ($d >= 1)
	        {
	            $r = round($d);
	            if($str != 'mois'){
	            	return $r . ' ' . $str . ($r > 1 ? 's' : '');
	            }
	            return $r . ' ' . $str;
	        }
	    }
	}
	/**
	 * Limit text by character counting
	 *
	 * @param string
	 * @param integer
	 * @return string
	 */
	public static function excerpt($text, $limit)
	{
		$words = explode(' ', $text);
		if(count($words) <= $limit)
		{
			return $text;
		}
		return implode(' ', array_slice($words, 0, $limit)).'...';
	}
}