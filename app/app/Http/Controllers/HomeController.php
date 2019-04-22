<?php
	
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;

	use App\HomeModel;

	use App\Country;

	use App\State;

	use App;

	use View;

	use Session;
		
	use Input;

	use Redirect;

	use Response;

	use Mail;

	class homeController extends Controller {
	
	//Home Page View
	public function index()
	{
		$data = HomeModel::getExchangeRates();
		return View::make('home.index')->with('e_currencies',$data);
	}

	//How to View
	public function howItWorks()
	{
          return View::make('home.how-it-works');	
	}

	//about View
	public function aboutUs()
	{
		return View::make('home.aboutUs');	
	}

	//faqs View
	public function faqs()
	{
		return View::make('home.faqs');	
	}

	//Contact View
	public function contactUs()
	{
		return View::make('home.contactUs');
	}

	//terms and condition
	public function termsCondition()
	{
		return View::make('home.termsCondition');	
	}

	//anti-money laundering
	public function antiMoneyPolicy()
	{
		return View::make('home.antiMoneyPolicy');	
	}

	//privacy policy
	public function privacyPolicy()
	{
		return View::make('home.privacyPolicy');	
	}

	//Register view
	public function registerView()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				return Redirect::to('/users/summary');
			}
			else
			{
				return Redirect::to('/admin/summary');
			}
		}
		return View::make('home.signup');

	}

	//Register View (States/Countries)
	public function statesView() {
		$countryId = Input::get('countryId');
		$states = State::where('countryCode', '=', $countryId)->get();
		return Response::json($states);
	}

	//Process Register
	public function register()
	{
		$inputs = Input::all();
		$validator = HomeModel::registerValidate($inputs);
		$checkUser = HomeModel::checkUser($inputs);

		if($validator->fails()) 
			{
				Session::flash('signup_message','Something went wrong, check your inputs.');
				return Redirect::to('/signup')->withErrors($validator)->withInput();
		} else {
			if ($checkUser) {
			Session::flash('signup_message','Your Email Address is already registered.');
			return Redirect::to('/signup');
		} else {
			$email_data = HomeModel::register($inputs);
			Mail::send('emails.welcome', $email_data, function($message) use ($email_data)
				{
			 	  $message->from('no-reply@astrooptions.com', 'Astro Options Notification');
			 	  $message->to($email_data['email'], $email_data['username'])->subject('Welcome to Astro Options');
			 	});

			Session::flash('register_message','You have been successfully registered, an email has been sent to your account.');
			return Redirect::to('/signup/success');
		}
		}
	}

	//login form view
	public function registerSuccess()
	{
		if(Session::get('register_message'))
			return View::make('home.signupsuccess');
		else
			return Redirect::to('/');		
	}

	//login form view
	public function loginView()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				return Redirect::to('/users/summary');
			}
			else
			{
				return Redirect::to('/admin/summary');
			}
		}
		return View::make('home.signin');
	}

	//process login
	public function login()
	{
		$inputs = Input::all();
		$validator = HomeModel::loginValidate($inputs);

		if($validator->passes())
			{
				$user = HomeModel::check($inputs);
				 if (!is_null($user))
					{
						HomeModel::setLoginSession($user);

						if(Session::get('login_count')<1)
							{
								$trading = HomeModel::create_trading();
								$balance = HomeModel::create_balance();
							}
						if(Session::get('account_status')=='Active')
							{
								$notification = HomeModel::login_note();
								if(Session::get('account_type')=='user')
								{
									return Redirect::to('/users/summary');
								}
								else
								{
									return Redirect::to('/admin/summary');
								}
							}
						else
							{
								Session::flash('signin_message','Account has been suspended/Disabled!');
								return Redirect::to('/signin');
							}
					}
				else
					{
						Session::flash('signin_message','Username or Password is wrong');
			        	return Redirect::to('/signin');
			        }
			 }
		 else
		 	{
		 		Session::flash('signin_message','Something went wrong, check your inputs.');
				return Redirect::to('/signin')->withErrors($validator)->withInput();	
		 	}

	}

	//Process log out
	public function logOut()
	{
		if(Session::get('user_id'))
		{
			Session::flush();
			Session::flash('login_message','You have logged out successfully');
			return Redirect::to('../');			
		}
		return Redirect::to('../');
	}

	//Password recovery view
	public function passwordRecovery()
	{
		return View::make('password.recoveryView');
	}

	//Password recovery generate token
	public function getToken()
	{
		$email = Input::get('email');
		$valid = HomeModel::generateToken($email);

		if($valid['status'])
		{
			$data = $valid['data'];
			$user = $valid['user'];

			Mail::send('emails.password', $data, function($message) use ($user)
				{

				  $message->from('no-reply@astrooptions.com', 'Astro Options Password Recovery');
				  $message->to($user->email)->subject('Password Recovery Token');

				});

			Session::flash('recovery_message','A token has been sent to '.$email.' and will be valid for 20 minutes; check your inbox or spam!');
			return Redirect::to('/signin/password-recovery');
		}
		else
		{
			Session::flash('recovery_message','That email is not registered on this service');
			return Redirect::to('/signin/password-recovery');
		}
	}

	//Password recovery validate token
	public function checkToken()
	{
		Session::flush();
		$valid = HomeModel::checkToken();

		if($valid['status'])
		{
			Session::put('token',$valid['token']);
			Session::flash('email',$valid['email']);
			return Redirect::to('/signin/password-recovery/new-password');
		}
		else
		{
			Session::flash('recovery_message',$valid['message']);
			return Redirect::to('/signin/password-recovery/status');
		}
	}

	//Password recovery new Password process
	public function newPasswordView()
	{
		if(Session::get('token'))
		{
			return View::make('password.reset');
		}
		App::abort(403);		
	}

	//Password recovery new Password process
	public function newPassword()
	{
		$valid = HomeModel::newPassword();

		if($valid['validator']->passes() AND $valid['status']==true)
		{
			Session::flash('recovery_message','Your password has been reset, so try and login now!');
			return Redirect::to('/signin/password-recovery/status');
		}
		elseif($valid['validator']->passes() AND $valid['status']==false)
		{
			Session::flash('recovery_message','Something went wrong, click the reset link from your email');
			return Redirect::to('/signin/password-recovery/status');
		}
		elseif ($valid['validator']->fails() AND $valid['status']==false)
		{
			return Redirect::to('/signin/password-recovery/new-password')->withErrors($valid['validator']);
		}
	}

	public function recoveryStatus()
	{
		if(Session::get('recovery_message'))
		{
			return View::make('password.status');
		}
		else
		{
			App::abort(403);
		}
	}


	public function getCurrencyDropDown()
	{
		if(Session::get('user_id'))
		{
			$data = HomeModel::getCurrencyDropDown();
			return $data;
		}
		else
		{
			App::abort(403);
		}
	}

	public function getBanks()
	{
		if(Session::get('user_id'))
		{
			$data = HomeModel::getBanks();
			return $data;
		}
		else
		{
			App::abort(403);
		}
	}

	public function getSexes()
	{
		if(Session::get('user_id'))
		{
			$data = HomeModel::getSexes();
			return $data;
		}
		else
		{
			App::abort(403);
		}
	}

	public function getCountries()
	{
		if(Session::get('user_id'))
		{
			$data = HomeModel::getCountries();
			return $data;
		}
		else
		{
			App::abort(403);
		}
	}

	public function getStates()
	{
		if(Session::get('user_id'))
		{
			$data = HomeModel::getStates();
			return $data;
		}
		else
		{
			App::abort(403);
		}
	}

	public function sitemap()
	{
		$xml = public_path().'/sitemap.xml';
		header('Content-Description: File Transfer');
		header('Content-Type: text/xml');
		header('Expires: 0');
		header('Content-Length: '.filesize($xml).'');
		readfile($xml);		
	}

	public function robots()
	{
		$txt = public_path().'/robots.txt';
		header('Content-Description: File Transfer');
		header('Content-Type: text/plain');
		header('Expires: 0');
		header('Content-Length: '.filesize($txt).'');
		readfile($txt);
	}

}
