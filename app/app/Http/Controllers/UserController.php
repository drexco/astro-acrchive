<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\UserModel;

use App;

use Session;

use View;

use Redirect;

use Input;

use Response;

use Mail;

class userController extends Controller {

	//Summary View
	public function summary()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
				$data = UserModel::getSummaryData($user_id);
				return View::make('user.summary')->with(array('data'=>$data));	
			}
			App::abort(403);
		}
		return Redirect::guest('/signin');
	}

	//Transactions
	public function transactions()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
				$data = UserModel::getTransactions($user_id);
				return View::make('user.transactions')->with('data',$data);
			}
			App::abort(403);
		}
		return Redirect::guest('/signin');
	}

	//Transaction View
	public function viewTransaction($transaction_id)
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
				$data = UserModel::getTransaction($user_id, $transaction_id);
				return View::make('user.transactionView')->with('data',$data);
			}
			App::abort(403);
		}
		return Redirect::guest('/signin');
	}

	//Settings View
	public function userProfileView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getUserData($user_id);
		 		return View::make('user.profile')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}

	//Settings View
	public function depositView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getFundsData($user_id);
		 		return View::make('user.deposit')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}

	//Settings View
	public function withdrawView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getFundsData($user_id);
		 		return View::make('user.withdraw')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}

	//Settings View
	public function transferView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getFundsData($user_id);
		 		return View::make('user.transfer')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}

	//Settings View
	public function tradeTransferView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getFundsData($user_id);
		 		return View::make('user.tradetransfer')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}

	//Settings View
	public function balanceView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getFundsData($user_id);
		 		return View::make('user.balance')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}

	//Settings View
	public function userSecurityView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getUserData($user_id);
		 		return View::make('user.security')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}


	//Edit Users informations 
	public function editInfo()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
				$inputs = Input::all();
				$validator = UserModel::validateInfo($inputs);

				if($validator->passes())
				{
					$details = UserModel::editUserInfo($user_id);
					Mail::send('emails.personalInfoSettings', $details, function($message) use ($details)
								 	{
								 	  $message->from('no-reply@astrooptions.com', 'Astro Options');
								 	  $message->to($details['email'])->subject('Profile Update');
								 	});
					Session::flash('editInfo_message','Changes were successful.');
					return Redirect::to('/users/profile');
				}
				else
				{
	             	Session::flash('editInfo_message','Something went wrong, please correct your inputs.');
					return Redirect::to('/users/profile')->withErrors($validator)->withInput();   
				}
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Users informations 
	public function transferFunds()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
				$details = UserModel::checkBalance($user_id);

					if ($details < Input::get('amount_in_usd'))
					{
						Session::flash('transferfunds_message','Insufficient balance.');
						return Redirect::to('/users/transferfunds');
					} else {
						UserModel::fundsTransfer($user_id);
						Session::flash('transferfunds_message','Transfer successful.');
						return Redirect::to('/users/transferfunds');
					}
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Users informations 
	public function transferTradeFunds()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='user')
			{
				$user_id = Session::get('user_id');
				$details = UserModel::checkTradeBalance($user_id);

					if ($details < Input::get('amount_in_usd'))
					{
						Session::flash('tradetransfer_message','Insufficient balance.');
						return Redirect::to('/users/tradetransfer');
					} else {
						UserModel::tradeTransfer($user_id);
						Session::flash('tradetransfer_message','Transfer successful.');
						return Redirect::to('/users/tradetransfer');
					}
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Password
	public function editPassword()
	{
		if(Session::get('user_id') )
		{
			if(Session::get('account_type')=='user')
				{
					$user_id = Session::get('user_id');
					$validator = UserModel::validatePassword();

				 	if($validator->passes())
					{
						$state = UserModel::editPassword($user_id);
						if($state)
						{
							$details = UserModel::editedPassword($user_id);
							Mail::send('emails.passwordSettings', $details, function($message) use ($details)
								 	{
								 	  $message->from('no-reply@astrooptions.com', 'Astro Options');
								 	  $message->to($details['email'])->subject('Password Update');
								 	});
							Session::flash('editPassword_message','Changes were successful.');	
							return Redirect::to('/users/security');						
						}
						else
						{
							Session::flash('editPassword_message','Oops, The old password provided is wrong.');
							return Redirect::to('/users/security');
						}
						
					}
					else
					{
		             	Session::flash('editPassword_message','Something went wrong, please correct your inputs.');
						return Redirect::to('/users/security')->withErrors($validator)->withInput();   
					}
				}
				App::abort(403);
 		}
 		App::abort(403);
 	}
}
