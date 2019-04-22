<?php

namespace App;

use DB;

use Validator;

use Session;

use Input;

class HomeModel {

	public static function getExchangeRates()
	{

		$rates = DB::table('currencies')
							->where('status','enabled')
							->select('currency_name','buy_value','sell_value','image','id','alias')
							->get();
		return $rates;

	}

	public static function generateToken($email)
	{

		$rules = array('email'=>'required|email');		
		$validator = Validator::make(Input::all(),$rules);
		
		if($validator->passes())
		{
			$exist = DB::table('users')
								  ->where('email',$email)
								  ->orWhere('username',$email)
								  ->select('email','id')
								  ->first();
			if(!is_null($exist))
			{
				$token = md5($email.date('Y-m-d H:i:s'));

				DB::table('users')
							->where('id',$exist->id)
							->update(
										array(
												'recovery_token' => $token,
												'recovery_time'	 => date('Y-m-d H:i:s',strtotime('+ 1 days'))
											 )
								    );


				$data = array(
								'token'=>$token,
								'email'=>$exist->email
							  );

				$result['status'] = true;
				$result['data'] = $data;
				$result['user'] = $exist;
				return $result;
			}
			else
			{
				$result['status'] = false;
				return $result;
			}
		}
		else
		{
			$result['status'] = false;
			return $result;
		}
	}

	//Password recovery check token
	public static function checkToken()
	{
		
		$rules = array(
						'email'=>'required|email',
						'token'=>'required'
					  );

		$validator = Validator::make(Input::all(),$rules);
		
		if($validator->passes())
		{
			$exist = DB::table('users')
								  ->where('email',Input::get('email'))
								  ->where('recovery_token',Input::get('token'))
								  ->select('recovery_time','email','recovery_token')
								  ->first();
			if(!is_null($exist))
			{
				$token_time = strtotime($exist->recovery_time);
				$now = strtotime(date('Y-m-d H:i:s'));

				if($token_time >= $now)
				{
					$data['token'] = $exist->recovery_token;
					$data['email'] = $exist->email;
					$data['status'] = true;
					return $data;
				}
				else
				{
					$data['message'] = 'Sorry your token has expired, request a new token!';
					$data['status'] = false;
					return $data;
				}				
			}
			else
			{
				$data['message'] = 'Something went wrong, please make sure to click the link from your email';
				$data['status'] = false;
				return $data;
			}
		}
		else
		{
			$data['message'] = 'Something went wrong, please make sure to click the link from your email';
			$data['status'] = false;
			return $data;
		}
		
	}

	public static function checkUser($inputs) 
	{
		$user = DB::table('users')
							->where('email', $inputs['email'])
							->select('username', 'email', 'account_type', 'id', 'last_login', 'status')
							->first();
		return $user;
	}

	public static function newPassword()
	{

		$rules = array(
						'password'=>'required|confirmed|alpha_num',
						'password_confirmation'=>'required'
					  );	

		$validator = Validator::make(Input::all(),$rules);
		
		if($validator->passes())
		{
			$update = DB::table('users')
						  ->where('email',Input::get('email'))	
						  ->where('recovery_token',Input::get('token'))	
						  ->update(
									array(
											'password' => md5(Input::get('password')),
											'recovery_token' => ' '
										 )
								  );

			if($update)
			{
				$data['validator'] = $validator;
				$data['status'] = true;
				return $data;
			}
			else
			{
				$data['validator'] = $validator;
				$data['status'] = false;
				return $data;
			}
			
		}
		else
		{
			$data['validator'] = $validator;
			$data['status'] = false;
			return $data;
		}
	}

	public static function registerValidate($inputs)
	{
		
		$rules = array(
				'username'=>'required|max:20',
				'email'=>'required|email',
				'password'=>'required|max:16'
			);

		
		$validator = Validator::make($inputs,$rules);
		return $validator;

	}

	public static function register($inputs)
	{
		$tempPassword = $inputs['password'];
		$insert_data = array(
				'username'=>$inputs['username'],
				'email'=>$inputs['email'],
				'password'=> md5($inputs['password']),
				'temp_password'=> $tempPassword,
				'account_type'=>'user',
				'last_login' => date('Y-m-d H:i:s'),
				'created_at'=> date('Y-m-d H:i:s'),
				'recovery_token'=>null,
				'recovery_time'=>null,
				'login_count'=>0,
				'language' => 'English',
				'verification_level' => 1,
				'status' => 'Active'
			);
		
		$insert = DB::table('users')->insert($insert_data);
		return $insert_data;
		

	}

	public static function loginValidate($inputs)
	{

		$rules = array(
			'username'=>'required',
			'password'=>'required'
		);

		$validator = Validator::make($inputs,$rules);
		return $validator;
		
	}

	
	public static function setLoginSession($user)
	{

		Session::put('account_type', $user->account_type) ;
		Session::put('user_id', $user->id);
		Session::put('username', $user->username);
		Session::put('account_status', $user->status);
		Session::put('email', $user->email);
		Session::put('login_count', $user->login_count);
		Session::put('last_login', $user->last_login);

	}

	public static function create_trading()
	{
		$trading_data = array(
				'user_id'=>Session::get('user_id'),
				'amount_in_usd'=>0.00,
				'account_balance'=> 0.00,
				'transferred_on'=> null,
				'account_type'=> 'Trading',
				'created_on'=>date('Y-m-d H:i:s'),
				'updated_on' =>date('Y-m-d H:i:s'),
				'status' => 'Enabled'
			);
		
		$insert = DB::table('trading_accounts')->insert($trading_data);
		return $trading_data;
	}

	public static function create_balance()
	{
		$balance_data = array(
				'user_id'=>Session::get('user_id'),
				'amount_in_usd'=>0.00,
				'account_balance'=>0.00,
				'transferred_on'=> null,
				'account_type'=> 'Balance',
				'ref_code'=>Session::get('user_id').time(),
				'deposited_on'=>null,
				'withdrawn_on'=>null,
				'created_on'=>date('Y-m-d H:i:s'),
				'updated_on' =>date('Y-m-d H:i:s'),
				'status' => 'Enabled'
			);

		$insert = DB::table('balance_accounts')->insert($balance_data);
		return $balance_data;
	}

	public static function login_note()
	{
		$note = array(
				'user_id'=>Session::get('user_id'),
				'notice'=>'Last Login',
				'message'=>'You last logged in on',
				'noted_on' =>date('D M Y G:i:s')
			);

		$insert = DB::table('notifications')->insert($note);
		return $note;
	}

	public static function check($inputs)
	{

		$user = DB::table('users')
							->where('username',$inputs['username'])
							->where('password',md5($inputs['password']))
							->select('account_type','id','username','email','last_login','status', 'login_count')
							->first();

		if(!is_null($user))
		{
			DB::table('users')
					->where('username',$inputs['username'])
					->where('password',md5($inputs['password']))
					->where('status','Enabled')
					->increment('login_count', 1);

			DB::table('users')
					->where('username',$inputs['username'])
					->where('password',md5($inputs['password']))
					->where('status','Enabled')
					->update(array('last_login' => date('Y-m-d H:i:s')));
		}
		
		return $user;
	}

	public static function getCurrencyDropDown()
	{

		$currencies = DB::table('currencies')
									->where('status','enabled')
									->select('buy_value','sell_value','currency_name')
									->get();

		return json_encode($currencies);
	}

	public static function getBanks()
	{

		$banks = DB::table('banks')
									->where('status','enabled')
									->select('bank_name')
									->get();


		$user = DB::table('users')
								->where('id',Session::get('user_id'))
								->select('bank_name')
								->first();
		$data['banks'] = $banks;
		$data['user_bank'] = $user->bank_name;

		return json_encode($data);
	}

	public static function getSexes()
	{

		$sexes = DB::table('sexes')
								->orderBy('id')
								->pluck('sex', 'id');


		return $sexes;
	}

	public static function getCountries()
	{
		$countries = DB::table('countries')
								->orderBy('id')
								->pluck('country', 'id');

		return $countries;
	}

	public static function getStates()
	{
		$states = DB::table('states')			
								->orderBy('id')
								->pluck('state', 'id');

		return $states;
	}

}
