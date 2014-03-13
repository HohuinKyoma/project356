<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'guest'), function()
{
	Route::get('login', function()
	{
		return View::make('login')->with('title', 'Login');
	});

	Route::post('login', function()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password), true))
		{
		    return Redirect::to('/');
		}
		else
		{
			return Redirect::back()->with('error', true);
		}
	});

		Route::get('lol', function()
	{
		return Hash::make('pass');
	});

	Route::get('code', function()
	{
		return View::make('code')->with('title', 'Entrez votre code');
	});

	Route::get('register', function() 
	{
		if( ! isset($_GET['c']) )
		{
			return View::make('errors.code')->with('title', 'Code Incorrect');
		}
		$c = $_GET['c'];
		$count = Code::where('value', $c)->where('count', '<',  3)->count();
		if( ! $count )
		{
			return View::make('errors.code')->with('title', 'Code Incorrect');
		}
		return View::make('register')->with('title', 'S\'enregistrer');
	});

	Route::post('register', function()
	{
	    $c = Input::get('code');
		$count = Code::where('value', $c)->where('count', '<',  3)->count();
		if( ! $count )
		{
			return View::make('errors.code')->with('title', 'Code Incorrect');
		}
		$rules = array(
			'nickname' => 'required|min:3|max:30',
			'email' => 'required|email',
			'password' => 'required|min:4|confirmed'
		);

		$v = Validator::make(Input::all(), $rules);

		if($v->fails())
		{
			return Redirect::back()
			->withErrors($v)
			->withInput();
		}

		$code = Code::where('value', $c)->where('count', '<',  3)->first();
		$count = $code->count;
		$code->count = $count + 1;
		$code->save();

		$user = new User();
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->father_id = $code->user->id;
		$user->save();

		$profile = new Profile();
		$profile->nickname = Input::get('nickname');
		$profile->user_id = $user->id;
		$profile->save();

		$avatar = new Avatar();
		$avatar->name = 'default';
		$avatar->type = 'png';
		$avatar->user_id = $user->id;
		$avatar->save();

		$code = New Code();
		$code->value =  strtoupper( Helper::code(8) );
		$code->user_id = $user->id;
		$code->generated = date("Y-m-d H:i:s");
		$code->save();

		return Redirect::to('login')->with('success', true);
	});
});




Route::group(array('before' => 'auth'), function()
	{
		Route::get('/', function()
		{
			$user = Auth::user();
			$c = true;
			$code = $user->code;
			if($code->count >= 3)
			{
				$limit = 1*24*60*60;
				$elapsed =  time() - strtotime($code->generated);

				if($elapsed < $limit)
				{
					$t = $limit - $elapsed;
					$c = Helper::timeAgo($t, false);
				}
				else
				{
					$code->count = 0;
					$code->generated = date("Y-m-d H:i:s");
					$code->save();
				}
			}
			return View::make('profile')
			->with('title', 'Bienvenue '.$user->profile->nickname)
			->with('code', $c)
			->with('user', $user);
		});

		Route::get('profile/{nickname}', function($nickname)
		{
			$profile = Profile::where('nickname', $nickname)->first();
			if(!$profile)
			{
				App::abort(404);
			}
			$user = $profile->user;
			if($user == Auth::user())
			{
				return Redirect::to('/');
			}
			$visit = Visit::where('visitor_id', Auth::user()->id)->first();

			if($visit)
			{
				$visit->forceDelete();	
			}

			$visit = new Visit();
			$visit->visitor_id = Auth::user()->id;
			$visit->visited_id = $user->id;
			$visit->save();
			return View::make('profile')
			->with('title', 'Profile de '.$user->profile->nickname)
			->with('user', $user);
		});

		Route::get('parameters', function()
		{
			return View::make('parameters')
			->with('title', 'Paramètres')
			->with('user', Auth::user());
		});

		Route::post('parameters', function()
		{
			$rules = array(
				'password' => 'min:4|confirmed',
				'avatar'   => 'mimes:jpeg,gif,png|max:2000'
			);

			$v = Validator::make(Input::all(), $rules);

			if($v->fails())
			{
				return Redirect::back()
				->withErrors($v)
				->withInput();
			}
			$user = Auth::user();
			if(Input::has('password'))
			{
				$user->password = Hash::make(Input::get('password'));
			}
			$user->save();

			if(Input::hasFile('avatar'))
			{
				$avatar = $user->avatar;
				$extension = Input::file('avatar')->getClientOriginalExtension();
				$name = uniqid().'_'.$user->profile->nickname;
				$avatar->name = $name;
				$avatar->type = $extension;
				$avatar->save();

				Helper::createAvatar(Input::file('avatar'), array('default' => 200, 'min' => 50), $name, $extension);
			}
			return Redirect::back()->with('success', true);

		});

		Route::get('search/{query}', function($query)
		{
			$profiles = Profile::where('nickname', 'LIKE', '%'.$query.'%')->get();
		});

		Route::get('news', function()
		{
			$posts = Post::orderBy('created_at', 'DESC')->paginate(10);
			return View::make('news')
			->with('title', 'News')
			->with('posts', $posts);
		});

		Route::get('news/{slug}', function($slug)
		{
			$post = Post::where('slug', $slug)->first();
			if(!$post)
			{
				return App::abort(404);
			}
			return View::make('post')
			->with('title', $post->title)
			->with('post', $post);
		});

		Route::get('logout', function()
		{
			Auth::logout();
			return Redirect::to('login');
		});
});

Route::group(array('before' => 'admin', 'prefix' => 'administration'), function()
	{
		Route::get('options', function()
		{
			return View::make('admin.options')
			->with('title', 'Options du site')
			->with('options', Option::first());
		});

		Route::post('options', function()
		{
			$rules = array(
			'title' => 'required|min:3|max:30',
			);

			$v = Validator::make(Input::all(), $rules);

			if($v->fails())
			{
				return Redirect::back()
				->withErrors($v)
				->withInput();
			}

			$options = Option::first();
			$options->title = Input::get('title');
			$options->maintenance = Input::get('maintenance');
			$options->ips = Input::get('ips');
			$options->save();

			return Redirect::back()->with('success', true);
		});

		Route::get('post/add', function()
		{
			return View::make('admin.post.add')
			->with('title', 'Ajouter un article');
		});

		Route::post('post/add', function()
		{
			$rules = array(
			'title' => 'required|min:5|max:150',
			'content' => 'required|min:10'
			);

			$v = Validator::make(Input::all(), $rules);

			if($v->fails())
			{
				return Redirect::back()
				->withErrors($v)
				->withInput();
			}
			$post = new Post();
			$post->title = Input::get('title');
			$post->slug = Str::slug(Input::get('title'));
			$post->content = Input::get('content');
			$post->user_id = Auth::user()->id;
			$post->save();

			return Redirect::to('news/'.$post->slug);
		});
});