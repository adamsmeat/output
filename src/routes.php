<?php

/*
|--------------------------------------------------------------------------
| adamsmeat/output routes
|--------------------------------------------------------------------------
|
| These routes are concerned with the package only
|
*/

Route::get('output', function()
{	
	$md_content = file_get_contents(Output::cfg('readme_file'));
	return Output::sendView()->with('content', Output::md_to_html($md_content));
});

// demo using theme
Route::get('output/theme/basic', function()
{
	//Output::theme('basic')->sendView();
	return Output::theme('basic')->sendView();
});


Route::get('template', function(){
	$config = array('assets.js.footer.LoginCtrl' => '/packages/adamsmeat/output/js/LoginCtrl.js');
	
	return Output::cfg($config)
	->sendView()
	->nest('content','output::pages.test')
	;
});

Route::post('template', function(){
	return Response::json(array(
		'firstName' => 'Paolo', 
		'lastName' => 'Umali'
	));
});

// angularjs
Route::get('angularjs', function(){
	$config = array('assets.js.footer.LoginCtrl' => '/packages/adamsmeat/output/js/LoginCtrl.js');
	
	return Output::cfg($config)
	->setTheme('angularjs')
	->sendView()
	;
});



//extra routes

Route::get('mga-kasunduan', function()
{
    return View::make('template')->nest('content', 'pages.mga-kasunduan');
});
Route::get('about', function()
{
    return View::make('template')->nest('content', 'pages.about');
});

// user
Route::get('dashboard', ['as' => 'dashboard', 'before' => 'auth', function()
{
    return View::make('template')->nest('content', 'pages.dashboard');
}]);

// register
Route::get('registration', ['as' => 'registration', 'before' => 'guest', function()
{
    return View::make('template')
    ->nest('content', 'pages.registration')
    ->with('title', 'Regisration')
    ;
}]);

Route::post('registration', function()
{
    // Differentiate between oauth-based vs manual(password used) type login



    $rules = [
    	'username' => [
    		'required', 
    		'unique:users',
    		'min:6'
    	],
    	'email' => [
    		'required', 
    		'email', 
    		'unique:users'
    	],
    	'password' => [
    		'required', 
    		'confirmed',
    		'min:8' 
    	]
    ];


    $validator = Validator::make(Input::all(), $rules);


    if ($validator->fails())
    {
        return Redirect::route('registration')
        ->withErrors($validator)
        ->withInput() // Input flashing
        ;
    }

    // The user's credentials are valid...
    //$event = Event::fire('user.registration.success', array(Auth::user()));

    $user = new User;
	$user->username = Input::get('username');
	$user->email = Input::get('email');
	$user->password = Hash::make(Input::get('password'));
	$user->save();

	Auth::loginUsingId($user->id);    
    return Redirect::route('dashboard');
  
});

// authentication
Route::get('login', ['as' => 'login', 'before' => 'guest', function()
{
    return View::make('template')
    ->nest('content', 'pages.login')
    ->with('title', 'Login Page')
    ;
}]);

Route::post('login', function()
{
    // Validation? Not in my quickstart!
    // No, but really, I'm a bad person for leaving that out
    // Differentiate between oauth-based vs manual(password used) type login
	if (Auth::attempt([
		'email' => Input::get('email'),
		'password' => Input::get('password')
	]))
	{
	    // The user's credentials are valid...
	    $event = Event::fire('user.manual.login.success', array(Auth::user()));
	    return Redirect::to('dashboard');
	}
	else return Redirect::route('login');    
});
Route::get('logout', ['as' => 'logout', 'before' => 'auth', function()
{
	Auth::logout();
    return Redirect::route('login');
}]);


// oauth
Route::get('social/{action?}', ['as' => 'hybridauth', function($action='')
{
	//return Response::make('whoami');

	// check URL segment
	if ($action == "auth") {
		// process authentication
		try {
			Hybrid_Endpoint::process();
		}
		catch (Exception $e) {
			// redirect back to http://URL/social/
			return Redirect::route('hybridauth');
		}
		return;
	}
	try {
		// create a HybridAuth object
		$socialAuth = new Hybrid_Auth(Config::get('hybridauth'));

		// authenticate with Facebook
		$provider = $socialAuth->authenticate("facebook");
		// fetch user profile
		$userProfile = $provider->getUserProfile();
	}
	catch(Exception $e) {
		// exception codes can be found on HybBridAuth's web site
		return "Error!";
	}
	// access user profile data
	echo "Connected with: <b>{$provider->id}</b><br />";
	echo "As: <b>{$userProfile->displayName}</b><br />";
	echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";

	// logout
	$provider->logout();	
}]);