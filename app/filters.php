<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	setlocale (LC_TIME, 'fr_FR','fra'); 

	$options = Option::first();

	// Maintenance Mode
	if($options->maintenance)
	{
		// Get the current users IP address
		$usersIp = Request::server('REMOTE_ADDR');
		$accessList = explode(',',str_replace(' ','',$options->ips));
		
		if(!in_array($usersIp, $accessList))
		{
			return View::make('errors.maintenance');
		}
	}
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});

Route::filter('admin', function()
{
	if (Auth::guest()) return App::abort(404);

	if ( ! Auth::user()->isAdmin()) return App::abort(404);
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

App::error(function(Exception $exception)
{
    Log::error($exception);
});

App::missing(function($exception)
{
	if(Auth::check())
	{
		$layout = 'layouts.auth';
	}
	else
	{
		$layout = 'layouts.main';
	}
    return Response::view('errors.404', array('layout' => $layout, 'title' => 'Page introuvable', 'page' => Request::url()), 404);
});