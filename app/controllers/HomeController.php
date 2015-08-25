<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');

	}

	// my authentication code 
	public function showLogin()
	{
		// show the form 
		return View::make('login');
	}
	public function doLogin()
	{
		// process the form 
		$rules = array(
			'email' => 'required|email', // making sure the email is an actual email 
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric & has tobe more than 3 chars 
		);

		//run the validatoion rules on the inputs from  form 
		$validator = Validator::make(Input::all(), $rules);

		// if the validation fails redirect back to the form 
		if($validator->fails() ) {
			return Redirect::to('login')
			->withErrors($validator) // send back all errors to the login form 
			->withInput(Input::except('password')); // send back the error input so that we can repopulate the form 
		} else {
			// creating userdata for the authentication 
			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
			);
			// attempting to do the login
			if (Auth::attempt($userdata)) {

				// validation successful 
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo succes though echoing in controller is very very bad practice 
				echo 'SUCCESS!';
			} else {
				// validation not successful send back to form 
				return Redirect::to('login');
			}

		}

	}

	public function doLogout()
	{
		Auth::logout(); // log the user out of the application 
		return Redirect::to('login');
	}
}
