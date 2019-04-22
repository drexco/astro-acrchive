<?php

namespace App;

use DB;

use Cache;

use Input;

use Session;

use stdClass;

use Validator;

use App;

class UserModel {


     //Get Summary Data
    public static function getSummaryData($user_id)
    {
        $cache_key = 'getUserSummary'.$user_id;
        $data = [];
        
        $trades = Cache::remember($cache_key,5,function() use($user_id){
            $trades = count(DB::table('orders')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Executed')
                                ->select('id','pair','amount','status','price_in_usd','initiated_on','executed_on','user_id')
                                ->orderBy('executed_on','DESC')
                                ->get());

            return $trades;
        });

        $notifications = count(DB::table('notifications')
                                ->where('user_id',$user_id)
                                ->take(1)
                                ->get());

        $notes = DB::table('notifications')
                                ->where('user_id',$user_id)
                                ->select('notice', 'message', 'noted_on')
                                ->orderBy('noted_on','DESC')
                                ->take(1)
                                ->get();

        $total_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->orderBy('initiated_on','DESC')
                                ->get());

        $total_orders = count(DB::table('orders')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->orderBy('initiated_on','DESC')
                                ->get());

        $account_balance = DB::table('balance_accounts')
                                ->where('user_id',$user_id)
                                ->select('account_balance')
                                ->get();

        $trading_balance = DB::table('trading_accounts')
                                ->where('user_id',$user_id)
                                ->select('account_balance')
                                ->get();                

        /*$notifications = DB::table('notifications')
                                     ->where('user_id',$user_id)
                                     ->select('notices','added')
                                     ->get();*/

        $data['last_login'] = Session::get('last_login');
        $data['totalOrders'] = $total_orders;
        $data['trades'] = $trades;
        $data['notes'] = $notes;
        $data['notifications'] = $notifications;
        $data['totalTransactions'] = $total_transactions;
        $data['accountBalance'] = $account_balance;
        $data['tradingBalance'] = $trading_balance;

        return $data;
    }

    //Get Transactions
    public static function getTransactions($user_id)
    {

        $cache_key = 'getUserTransactions'.$user_id;
        $data = Cache::remember($cache_key,5,function() use($user_id)
        {
            $data = DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->select('id','amount_in_usd','ref_code','transaction_type','charges','initiated_on','completed_on', 'status')
                                ->orderBy('initiated_on','DESC')
                                ->limit(20)
                                ->get();
            return $data;
        });
        return $data; 
    }

    //Get Transaction
    public static function getTransaction($user_id, $transaction_id)
    {
        $data = DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('id',$transaction_id)
                                ->select('id','amount_in_usd','ref_code','transaction_type','charges','initiated_on','completed_on','status')
                                ->orderBy('initiated_on','DESC')
                                ->first();
        return $data;
    }

    //Get User Data
    public static function getUserData($user_id)
    {
        $data = DB::table('users')
                            ->where('id',$user_id)
                            ->select('id', 'username', 'language', 'verification_level', 'last_login', 'created_at', 'status', 'email')
                            ->first();
        return $data;
    }

    //Check Balance
    public static function checkBalance($user_id) 
    {
        $account_balance = DB::table('balance_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('account_balance')
                            ->first()
                            ->{'account_balance'};

        return $account_balance;
    }

    //Check Balance
    public static function checkTradeBalance($user_id) 
    {
        $account_balance = DB::table('trading_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('account_balance')
                            ->first()
                            ->{'account_balance'};

        return $account_balance;
    }

    //Funds Transfer
    public static function fundsTransfer($user_id)
    {
        $old_balance = DB::table('trading_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('account_balance')
                            ->first()
                            ->{'account_balance'};

        $old_account_balance = DB::table('balance_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('account_balance')
                            ->first()
                            ->{'account_balance'};

        $new_balance = $old_balance + Input::get('amount_in_usd');

        $new_account_balance = $old_account_balance - Input::get('amount_in_usd');

        $update_data = array(
                         'account_balance' => $new_balance,
                         'transferred_on' => date('Y-m-d H:i:s'),
                         'updated_on'=> date('Y-m-d H:i:s'),
                        );

        $update_account_data = array(
                         'account_balance' => $new_account_balance,
                         'transferred_on' => date('Y-m-d H:i:s'),
                         'updated_on'=> date('Y-m-d H:i:s'),
                        );

        $update = DB::table('trading_accounts')
                    ->where('user_id',$user_id)
                    ->update($update_data);  

        $update_account = DB::table('balance_accounts')
                    ->where('user_id',$user_id)
                    ->update($update_account_data); 

        $account_id = DB::table('balance_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('id')
                            ->first()
                            ->{'id'};

        $insert_data = array(
                'user_id'=>Session::get('user_id'),
                'account_id'=>$account_id,
                'amount_in_usd'=>Input::get('amount_in_usd'),
                'transaction_type'=>'Transfer',
                'ref_code'=>Session::get('user_id').time(),
                'initiated_on' => date('Y-m-d H:i:s'),
                'completed_on'=> date('Y-m-d H:i:s'),
                'charges'=>0.00,
                'status' => 'Paid'
            );
        
        $insert = DB::table('transactions')->insert($insert_data);

        return $update;
        return $update_account;
        return $insert_data;
    }

    //Funds Transfer
    public static function tradeTransfer($user_id)
    {
        $old_balance = DB::table('balance_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('account_balance')
                            ->first()
                            ->{'account_balance'};

        $old_trading_balance = DB::table('trading_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('account_balance')
                            ->first()
                            ->{'account_balance'};

        $new_balance = $old_balance + Input::get('amount_in_usd');

        $new_trading_balance = $old_trading_balance - Input::get('amount_in_usd');

        $update_data = array(
                         'account_balance' => $new_balance,
                         'transferred_on' => date('Y-m-d H:i:s'),
                         'updated_on'=> date('Y-m-d H:i:s'),
                        );

        $update_trading_data = array(
                         'account_balance' => $new_trading_balance,
                         'transferred_on' => date('Y-m-d H:i:s'),
                         'updated_on'=> date('Y-m-d H:i:s'),
                        );

        $update = DB::table('balance_accounts')
                    ->where('user_id',$user_id)
                    ->update($update_data);  

        $update_trading = DB::table('trading_accounts')
                    ->where('user_id',$user_id)
                    ->update($update_trading_data); 

        $account_id = DB::table('trading_accounts')
                            ->where('user_id', Session::get('user_id'))
                            ->select('id')
                            ->first()
                            ->{'id'};

        $insert_data = array(
                'user_id'=>Session::get('user_id'),
                'account_id'=>$account_id,
                'amount_in_usd'=>Input::get('amount_in_usd'),
                'transaction_type'=>'Transfer',
                'ref_code'=>Session::get('user_id').time(),
                'initiated_on' => date('Y-m-d H:i:s'),
                'completed_on'=> date('Y-m-d H:i:s'),
                'charges'=>0.00,
                'status' => 'Paid'
            );
        
        $insert = DB::table('transactions')->insert($insert_data);

        return $update;
        return $update_account;
        return $insert_data;
    }

    //Get User Data
    public static function getFundsData($user_id)
    {
        $trading = DB::table('trading_accounts')
                            ->where('user_id',$user_id)
                            ->select('account_balance', 'account_type', 'amount_in_usd', 'transferred_on', 'updated_on', 'created_on', 'status')
                            ->first();

        $balance = DB::table('balance_accounts')
                            ->where('user_id',$user_id)
                            ->select('account_balance', 'account_type', 'amount_in_usd', 'transferred_on', 'updated_on', 'created_on', 'status', 'deposited_on', 'withdrawn_on', 'ref_code')
                            ->first();


        $notifications = count(DB::table('notifications')
                                ->where('user_id',$user_id)
                                ->take(1)
                                ->get());

        $notes = DB::table('notifications')
                                ->where('user_id',$user_id)
                                ->select('notice', 'message', 'noted_on')
                                ->orderBy('noted_on','DESC')
                                ->take(1)
                                ->get();

        $data['notes'] = $notes;
        $data['trading'] = $trading;
        $data['balance'] = $balance;
        $data['notifications'] = $notifications;
        return $data;
    }

    //Edit User Information
    public static function editUserInfo($user_id)
    {

        $update_data = array(
                         'language' => Input::get('language'),
                         'username' => Input::get('username')
                        );

       $update = DB::table('users')
                    ->where('id',$user_id)
                    ->update($update_data);  

        Session::put('language',Input::get('language'));
        Session::put('username',Input::get('username'));

        return $update_data;
    }

     //Validate User Information
    public static function validateInfo($inputs)
    {
        $rules = array(
                        'username'=>'required|max:20',
                        'language'=>'required'
                      );
        $validator = Validator::make($inputs,$rules);
        return $validator;
    }

    //Edit Password
    public static function editPassword($user_id)
    {
    
        $new_password = Input::get('new_password');
        $old_password = Input::get('old_password');

        $get_password = DB::table('users')->where('id',$user_id)->select('password')->first();

        $update_data = array(
                         'password' =>md5($new_password),
                         'email' => Session::get('email')
                        );

        if(md5($old_password)==$get_password->password)
        {
            $update = DB::table('users')->where('id',$user_id)->update($update_data);
            return true; 
        }
        else
        {
            return false;
        }

        Session::put('email',Session::get('email'));
    }

    //Edited Password
    public static function editedPassword($user_id)
    {
        $updated_data = array(
                         'email' => Session::get('email')
                        );

        $update = DB::table('users')->where('id',$user_id)->update($updated_data); 

        Session::put('email',Session::get('email'));

        return $updated_data;
    }

    //Validate Password
    public static function validatePassword()
    {
        $rules = array(
                        'old_password'=>'required',
                        'new_password'=>'required|min:8|max:20',
                      );

        $validator = Validator::make(Input::all(),$rules);
        return $validator;

    }

}
