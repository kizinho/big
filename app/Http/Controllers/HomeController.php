<?php

namespace App\Http\Controllers;

use App\UserCoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Investment;
use App\Withdraw;
use App\Plan;
use App\Coin;
use \App\Http\Controllers\Traits\HasError;
use App\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\PlanDepositMail;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Reference;
use App\User;
use App\TraitsFolder\MailTrait;
use App\Mail\SendNotifyMail;
Use BlockIo;

class HomeController extends Controller {

    use HasError,
        MailTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data['total_balance'] = UserCoin::whereUser_id(Auth::user()->id)->sum('amount');
        $data['total_deposit'] = Investment::whereUser_id(Auth::user()->id)->whereStatus_deposit(1)->sum('amount');
        $data['active_deposit'] = Investment::whereUser_id(Auth::user()->id)->whereStatus_deposit(1)->whereStatus(0)->sum('amount');
        $data['last_deposit'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(1)->pluck('amount')->first();
        $data['total_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(1)->sum('amount');
        $data['pending_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(0)->sum('amount');
        $data['last_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(1)->pluck('amount')->first();
        $data['earned'] = UserCoin::whereUser_id(Auth::user()->id)->sum('earn');
        $data['ref_balance'] = UserCoin::whereUser_id(Auth::user()->id)->sum('bonus');
        $data['users'] = User::count();
        $data['all_deposits'] = Investment::whereStatus_deposit(1)->count();
        $data['all_withdraws'] = Withdraw::count();
        $data['plans'] = Plan::count();
        $data['active_investment'] = Investment::where('due_pay', '>', Carbon::now())->count();
        $data['completed_investment'] = Investment::whereStatus(true)->count();
        $data['pending_investment'] = Investment::whereStatus_deposit(false)->count();
        $data['confirm_investment'] = Investment::whereStatus_deposit(true)->count();
        $data['withdraws_pending'] = Withdraw::whereStatus(false)->count();
        $data['withdraws_complete'] = Withdraw::whereStatus(true)->count();
        $data['name_ref'] = Reference::whereReferred_id(Auth::user()->id)->first();
        $data['my_invests'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(3)->get();
        return view('home', $data);
    }

    public function deposit() {
        $data['total_balance'] = UserCoin::whereUser_id(Auth::user()->id)->sum('amount');
        $data['earned'] = UserCoin::whereUser_id(Auth::user()->id)->sum('earn');
        $data['coins'] = Coin::whereSlug('bitcoin_address')->first();
        $data['plans'] = Plan::all();
        return view('user.deposit', $data);
    }

    public function success() {
        return view('user.success');
    }

    public function getPlan(Request $request) {
        $min = Plan::whereId($request->plan_id)->first();
        if ($min->name == 'PLAN 6') {
            $data['min'] = $min->min;
            $data['sign'] = 'BTC';
            $data['profit'] = $min->min * $min->percentage / 100;
        } else {
            $data['min'] = number_format($min->min, 2);
            $data['sign'] = '$';
            $data['profit'] = '$' . $min->min * $min->percentage / 100;
        }
        $data['amount'] = $min->min;
        $data['percentage'] = $min->percentage . '%';
        $data['p_id'] = $min->id;
        return $data;
    }

    public function getCoin(Request $request) {
        $coin = Coin::whereId($request->coin_id)->first();
        $usercoin = UserCoin::whereUser_id(Auth::user()->id)->whereCoin_id($coin->id)->first();
        if (is_object($usercoin)) {


            $data['usermoney'] = '$' . $usercoin->amount;
            $plan = Plan::whereId($request->plan_id)->first();
            if ($plan->name == 'PLAN 6') {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
                $pp = $plan->min * $btcrate;
                if ($usercoin->amount < $pp) {
                    $data['message_danger'] = 'You are not Eligble to Spend , Please Click Spend to Deposit  ';
                    $data['status'] = 401;
                } else {
                    $data['message_success'] = 'You are Eligble to Spend Fund from this Address , Please Click Spend to Invest';
                    $data['status'] = 200;
                }
            } else {
                if ($usercoin->amount < $plan->min) {
                    $data['message_danger'] = 'You are not Eligble to Spend , Please Click Spend to Deposit  ';
                    $data['status'] = 401;
                } else {
                    $data['message_success'] = 'You are Eligble to Spend Fund from this Address , Please Click Spend to Invest';
                    $data['status'] = 200;
                }
            }
        } else {
            $data['message_danger'] = 'You Need to Add this Coin, Go to your Account Setting to add it ';
            $data['status'] = 401;
        }

        return $data;
    }

    public function createDeposit(Request $request) {

        $setting = Setting::whereId(1)->first();
        $charge = $setting['deposit_investment_charge'];
        $input = $request->all();
        $amount_pay = $request->amount + $charge;

        $rules = [
            'plan' => 'required',
            'amount' => 'required'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        DB::beginTransaction();
        try {
            $coin = Coin::whereId($request->coin_id)->first();
            if (!is_object($coin)) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Select coin Address');
                return redirect()->back();
            }
            $checkuser = UserCoin::whereUser_id(Auth::user()->id)->whereCoin_id($request->coin_id)->first();
            if (!is_object($checkuser)) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'You Need to Add this Coin,Go to your Account Setting to add it');
                return redirect()->back();
            }
            //btc 
            try {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Bitcoin Server Very Busy , Try Again');
                return redirect()->back();
            }

            $action = $coin->slug;
            //check plan
            $plan = Plan::whereId($request->plan)->first();

            if ($request->amount < $plan->min) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Amount is less than the minimum amount for this plan');
                return redirect()->back();
            }

            if ($request->amount > $plan->max) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Amount is greater than the maxmium amount for this plan');
                return redirect()->back();
            }
            $useramount = $checkuser->amount;



            if ($useramount < $request->amount) {
                $data['fund'] = 'fund';
            } else {
                $data['fund'] = 'fund';
            }

            //substract
            if ($data['fund'] == 'invest') {

                $sub = UserCoin::whereUser_id(Auth::user()->id)->whereCoin_id($request->coin_id)->first();
                $amountd = $request->amount + $charge;
                $sub->update([
                    'amount' => $sub->amount - $amountd
                ]);
                $current = Carbon::now();
                $status_deposit = true;
                $due = $current->addHours($plan->compound->compound);
                $due_pay = $due->addMinutes(2);
                $txt = strtoupper(Str::random(20));
            } else {
                $status_deposit = false;
                $due_pay = null;
                $txt = strtoupper(Str::random(20));
            }
            if ($request->transaction_id) {
                //create investment

                $invest = Investment::whereTransaction_id($request->transaction_id)->first();
                $invest->update([
                            'transaction_id' => $request->transaction_id,
                            'user_id' => Auth::user()->id,
                            'plan_id' => $request->plan,
                            'coin_id' => $request->coin_id,
                            'amount' => $request->amount,
                            'deposit_investment_charge' => $charge,
                            'run_count' => 0,
                            'due_pay' => $due_pay,
                            'status_deposit' => $status_deposit,
                            'settled_status' => 0,
                            'status' => 0
                ]);
            } else {
                //create investment

                $invest = Investment::create([
                            'transaction_id' => $txt,
                            'user_id' => Auth::user()->id,
                            'plan_id' => $request->plan,
                            'coin_id' => $request->coin_id,
                            'amount' => $request->amount,
                            'deposit_investment_charge' => $charge,
                            'run_count' => 0,
                            'due_pay' => $due_pay,
                            'status_deposit' => $status_deposit,
                            'settled_status' => 0,
                            'status' => 0
                ]);
            }

            $profit = $invest->amount * $plan->percentage / 100;
            //transcation log
            Transaction::create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $invest->transaction_id,
                'type' => 'Deposit Investment',
                'name_type' => 'Deposit',
                'deposit_investment_charge' => $charge,
                'coin_id' => $request->coin_id,
                'amount' => $invest->amount,
                'amount_profit' => $profit,
                'description' => 'You Deposited Under  ' . $plan->name
            ]);
            //convert plan 6
            if ($plan->name == 'PLAN 6') {
                //amount in btc or lite or btc cash
                if ($action == 'bitcoin_address') {
                    $data['amount_convert'] = $pp / $btcrate;
                    $data['name'] = 'BTC';
                    $data['name_full'] = 'bitcoin';
                }
                if ($action == 'litecoin_address') {
                    try {
                        $lit = file_get_contents('https://api.coinmarketcap.com/v1/ticker/litecoin/?convert=USD');
                        $litecoin = json_decode($lit);
                        $litecoin_final = $litecoin[0]->price_usd;
                        $data['amount_convert'] = $pp / $litecoin_final;
                        $data['name'] = 'LTE';
                        $data['name_full'] = 'litecoin';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Litecoin Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
                if ($action == 'ethereum_address') {
                    //eth
                    try {
                        $eth = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD');
                        $ethereum = json_decode($eth);
                        $ethereum_final = $ethereum[0]->price_usd;
                        $data['amount_convert'] = $pp / $ethereum_final;
                        $data['name'] = 'ETH';
                        $data['name_full'] = 'ethereum';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Ethereum Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
                if ($action == 'bitcoin_cash_address') {
                    //bitcoin cash
                    try {
                        $btic_cash = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/?convert=USD');
                        $dash = json_decode($btic_cash);
                        $cash_final = $dash[0]->price_usd;
                        $data['amount_convert'] = $pp / $cash_final;
                        $data['name'] = 'BTC Cash';
                        $data['name_full'] = 'bitcoin-cash';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Bitcoin Cash Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
                if ($action == 'dash_address') {

                    //dash
                    try {
                        $da = file_get_contents('https://api.coinmarketcap.com/v1/ticker/dash/?convert=USD');
                        $dash = json_decode($da);
                        $dash_final = $dash[0]->price_usd;
                        $data['amount_convert'] = $pp / $dash_final;
                        $data['name'] = 'dash';
                        $data['name_full'] = 'dash';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Dash Cash Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
            } else {

                //amount in btc or lite or btc cash
                if ($action == 'bitcoin_address') {
                    $data['amount_convert'] = $amount_pay / $btcrate;
                    $data['name'] = 'BTC';
                    $data['name_full'] = 'bitcoin';
                }
                if ($action == 'litecoin_address') {
                    try {
                        $lit = file_get_contents('https://api.coinmarketcap.com/v1/ticker/litecoin/?convert=USD');
                        $litecoin = json_decode($lit);
                        $litecoin_final = $litecoin[0]->price_usd;
                        $data['amount_convert'] = $amount_pay / $litecoin_final;
                        $data['name'] = 'LTE';
                        $data['name_full'] = 'litecoin';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Litecoin Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
                if ($action == 'ethereum_address') {

                    try {
                        $eth = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD');
                        $ethereum = json_decode($eth);
                        $ethereum_final = $ethereum[0]->price_usd;
                        $data['amount_convert'] = $amount_pay / $ethereum_final;
                        $data['name'] = 'ETH';
                        $data['name_full'] = 'ethereum';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Ethereum Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
                if ($action == 'bitcoin_cash_address') {
                    //bitcoin cash
                    try {
                        $btic_cash = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/?convert=USD');
                        $dash = json_decode($btic_cash);
                        $cash_final = $dash[0]->price_usd;
                        $data['amount_convert'] = $amount_pay / $cash_final;
                        $data['name'] = 'BTC Cash';
                        $data['name_full'] = 'bitcoin-cash';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Bitcoin Cash Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
                if ($action == 'dash_address') {

                    //dash
                    try {
                        $da = file_get_contents('https://api.coinmarketcap.com/v1/ticker/dash/?convert=USD');
                        $dash = json_decode($da);
                        $dash_final = $dash[0]->price_usd;
                        $data['amount_convert'] = $amount_pay / $dash_final;
                        $data['name'] = 'dash';
                        $data['name_full'] = 'dash';
                    } catch (\Exception $e) {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', 'Dash Cash Server Very Busy , Try Again');
                        return redirect()->back();
                    }
                }
            }

            $data['invest'] = $invest;
            $data['coin'] = $coin;
            $data['plan'] = $plan;
            $data['profit'] = $profit;
            $data['sendaddress'] = $data['name_full'] . ':' . $coin->address;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        //send user email
        if ($data['fund'] == 'invest') {
            //check reference for bouns
            $actionb = $invest->coin->slug;
            if ($actionb == 'bitcoin_address') {
                $name = 'Bitcoin';
            }
            if ($actionb == 'litecoin_address') {

                $name = 'Litecoin';
            }
            if ($actionb == 'ethereum_address') {
                $name = 'Ethereum';
            }
            if ($actionb == 'bitcoin_cash_address') {
                $name = 'Bitcoin Cash';
            }
            if ($actionb == 'dash_address') {
                $name = 'Dash';
            }
            foreach ($invest->user->coin as $ucoin) {
                if ($invest->coin_id == $ucoin->coin_id) {

                    $address = $ucoin->address;
                }
            }
            $user_ref = Reference::whereReferred_id($invest->user_id)->first();
            if (is_object($user_ref)) {
                //plan ref percentage
                $bonus = $invest->amount * $invest->plan->ref / 100;
                $pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($invest->coin_id)->first();
                if (is_object($pay)) {
                    $pay->bonus = $pay->bonus + $bonus;
                    $pay->save();
                    //transcation log
                    Transaction::create([
                        'user_id' => $invest->user_id,
                        'transaction_id' => $invest->transaction_id,
                        'type' => 'Commissions',
                        'name_type' => 'Referral Bonus',
                        'coin_id' => $invest->coin_id,
                        'amount' => $bonus,
                        'amount_profit' => $bonus,
                        'description' => 'Referral Bonus Under ' . $invest->plan->name
                    ]);
                    $message = '$' . $bonus . " Referral Bonus has been successfully sent your " . $name . " account " . $address . '.' . " Transaction ID Is : #$invest->transaction_id";

                    $text = $message;
                    $this->sendMail($pay->user->email, $pay->user->full_name, 'Referral Bonus.', $text);
                }
            }


            $email = Auth::user()->email;
            $subject = 'New investment';
            $message = $data['amount_convert'] . " - " . $data['name'] . " Invest Under " . $plan->name . " Transaction ID Is : #$invest->transaction_id";
$this->sendMail($email, Auth::user()->full_name, 'New investment.', $message);
           // Notification::route('mail', $email)
                    //->notify(new PlanDepositMail($subject, $message));

            session()->flash('message.level', 'success');
            session()->flash('message.color', 'success');
            session()->flash('message.content', 'The Deposit Has Been Successfully Saved');
            return redirect()->back();
        }
        if ($data['fund'] == 'fund') {
            $realcount = number_format(floatval($data['amount_convert']), 8, '.', '');
            Investment::whereId($invest->id)->update([
                'amount_check' => $realcount
            ]);
        }

        return view('user.deposit-fund', $data);
    }

    public function withdraw() {
        $data['total_balance'] = UserCoin::whereUser_id(Auth::user()->id)->sum('amount');
        $data['total_earn'] = UserCoin::whereUser_id(Auth::user()->id)->sum('earn');
        $data['total_bonus'] = UserCoin::whereUser_id(Auth::user()->id)->sum('bonus');
        $data['pending_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(0)->sum('amount');
        $data['usercoin'] = UserCoin::whereUser_id(Auth::user()->id)->get();
        return view('user.withdraw', $data);
    }

    public function withdrawPost(Request $request) {
        $input = $request->all();

        $setting = Setting::whereId(1)->first();
        $charge = $setting['withdraw_charge'];
        $amount_to_withdraw = $request->amount + $charge;
        $amount_to_convert = $request->amount - $charge;

        $rules = [
            'coin' => 'required',
            'withdraw_from' => 'required',
            'amount' => 'required'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if ($request->amount < $setting->min_withdraw) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'The  Amount you Entered is Very Small to Withdraw');
            return redirect()->back();
        }
        if (Auth::user()->can_withdraw == true) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'You can not make a withdraw right now, your account is under review');
            return redirect()->back();
        }
        DB::beginTransaction();
        try {

            $usercoin = UserCoin::whereUser_id(Auth::user()->id)->whereCoin_id($request->coin)->first();

            if ($request->withdraw_from == 'all') {
                $amount_compare = $usercoin->amount + $usercoin->earn + $usercoin->bonus;
                if ($amount_to_withdraw > $amount_compare) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Amount to withdraw is greater than the amount in your  address' . ' ' . $request->withdraw_from);
                    return redirect()->back();
                }
            }
            if ($request->withdraw_from == 'Balance') {
                $amount_compare = $usercoin->amount;
            }
            if ($request->withdraw_from == 'Profit') {
                $amount_compare = $usercoin->earn;
            }
            if ($request->withdraw_from == 'Referal Bonus') {
                $amount_compare = $usercoin->bonus;
            }

            if ($amount_to_withdraw > $amount_compare) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Amount to withdraw is greater than the amount in your  address' . ' ' . $request->withdraw_from);
                return redirect()->back();
            }
            //btc 
            try {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Bitcoin Server Very Busy , Try Again');
                return redirect()->back();
            }
            $coin = Coin::whereId($request->coin)->first();
            $action = $coin->slug;
            //amount in btc or lite or btc cash
            if ($action == 'bitcoin_address') {
                $data['amount_convert'] = $amount_to_convert / $btcrate;
                $data['name'] = 'BTC';
                $data['name_full'] = 'bitcoin';
            }
            if ($action == 'litecoin_address') {
                try {
                    $lit = file_get_contents('https://api.coinmarketcap.com/v1/ticker/litecoin/?convert=USD');
                    $litecoin = json_decode($lit);
                    $litecoin_final = $litecoin[0]->price_usd;
                    $data['amount_convert'] = $amount_to_convert / $litecoin_final;
                    $data['name'] = 'LTE';
                    $data['name_full'] = 'litecoin';
                } catch (\Exception $e) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Litecoin Server Very Busy , Try Again');
                    return redirect()->back();
                }
            }
            if ($action == 'ethereum_address') {

                try {
                    $eth = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD');
                    $ethereum = json_decode($eth);
                    $ethereum_final = $ethereum[0]->price_usd;
                    $data['amount_convert'] = $amount_to_convert / $ethereum_final;
                    $data['name'] = 'ETH';
                    $data['name_full'] = 'ethereum';
                } catch (\Exception $e) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Ethereum Server Very Busy , Try Again');
                    return redirect()->back();
                }
            }
            if ($action == 'bitcoin_cash_address') {
                //bitcoin cash
                try {
                    $btic_cash = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/?convert=USD');
                    $dash = json_decode($btic_cash);
                    $cash_final = $dash[0]->price_usd;
                    $data['amount_convert'] = $amount_to_convert / $cash_final;
                    $data['name'] = 'BTC Cash';
                    $data['name_full'] = 'bitcoin-cash';
                } catch (\Exception $e) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Bitcoin Cash Server Very Busy , Try Again');
                    return redirect()->back();
                }
            }
            if ($action == 'dash_address') {

                //dash
                try {
                    $da = file_get_contents('https://api.coinmarketcap.com/v1/ticker/dash/?convert=USD');
                    $dash = json_decode($da);
                    $dash_final = $dash[0]->price_usd;
                    $data['amount_convert'] = $amount_to_convert / $dash_final;
                    $data['name'] = 'dash';
                    $data['name_full'] = 'dash';
                } catch (\Exception $e) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Dash Cash Server Very Busy , Try Again');
                    return redirect()->back();
                }
            }
            $am = number_format(floatval($data['amount_convert']), 8, '.', '');
            //create withdraw
 
            $withdraw = Withdraw::create([
                        'transaction_id' => strtoupper(Str::random(20)),
                        'user_id' => Auth::user()->id,
                        'coin_id' => $usercoin->coin_id,
                        'usercoin_id' => $request->coin,
                        'withdraw_from' => $request->withdraw_from,
                        'description' => 'You Widthraw  ' . '$' . $request->amount,
                        'amount' => round($request->amount,2),
                        'comment' => $request->comment,
                        'total_amount' => $request->amount + $charge,
                        'withdraw_charge' => $charge,
                        'message' => null,
                        'amount_check' => $am,
                        'confirm' => 0,
                        'status' => 0
            ]);

            //transcation log
            Transaction::create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $withdraw->transaction_id,
                'type' => 'Withdraw',
                'name_type' => 'Withdraw',
                'withdraw_charge' => $charge,
                'coin_id' => $request->coin,
                'amount' => $withdraw->amount,
                'description' => 'You Widthraw  ' . '$' . $request->amount
            ]);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        $data['withdraw'] = $withdraw;
        $data['address'] = $usercoin->address;
        $data['total_balance'] = UserCoin::whereUser_id(Auth::user()->id)->sum('amount');
        $data['total_earn'] = UserCoin::whereUser_id(Auth::user()->id)->sum('earn');
        $data['total_bonus'] = UserCoin::whereUser_id(Auth::user()->id)->sum('bonus');
        return view('user.withdraw-fund', $data);
    }

    public function withdrawFund(Request $request) {
        $setting = Setting::whereId(1)->first();
        $on = $setting['auto_withdraw'];
        $input = $request->all();
        $rules = [
            'withdraw' => 'required'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        $setting = Setting::whereId(1)->first();

        $withdraw = Withdraw::whereId($request->withdraw)->first();
        $action = $withdraw->coin->slug;
        $pin = $setting['block_io_pin'];

        if ($action == 'bitcoin_address') {
            $name = 'Bitcoin';
            $apiKey = $withdraw->coin->api_key;
            $version = 2; // API version
            $block_io = new BlockIo($apiKey, $pin, $version);
            $site_address = $withdraw->coin->address;
        }
        if ($action == 'litecoin_address') {

            $name = 'Litecoin';
            $apiKey = $withdraw->coin->api_key;
            $version = 2; // API version
            $block_io = new BlockIo($apiKey, $pin, $version);
            $site_address = $withdraw->coin->address;
        }
        if ($action == 'ethereum_address') {
            $name = 'Ethereum';
            $apiKey = $withdraw->coin->api_key;
            $version = 2; // API version
            $block_io = new BlockIo($apiKey, $pin, $version);
            $site_address = $withdraw->coin->address;
        }
        if ($action == 'bitcoin_cash_address') {
            $name = 'Bitcoin Cash';
            $apiKey = $withdraw->coin->api_key;
            $version = 2; // API version
            $block_io = new BlockIo($apiKey, $pin, $version);
            $site_address = $withdraw->coin->address;
        }
        if ($action == 'dash_address') {
            $name = 'Dash';
            $apiKey = $withdraw->coin->api_key;
            $version = 2; // API version
            $block_io = new BlockIo($apiKey, $pin, $version);
            $site_address = $withdraw->coin->address;
        }
        //amount in btc or lite or btc cash
        $amount_to_convert = $withdraw->total_amount;
        if ($action == 'bitcoin_address') {
            $all = file_get_contents("https://blockchain.info/ticker");
            $res = json_decode($all);
            $btcrate = $res->USD->last;
            $data['amount_convert'] = $amount_to_convert / $btcrate;
            $charge = $setting['withdraw_charge'] / $btcrate;
            $data['name'] = 'BTC';
            $data['name_full'] = 'bitcoin';
        }
        if ($action == 'litecoin_address') {
            try {
                $lit = file_get_contents('https://api.coinmarketcap.com/v1/ticker/litecoin/?convert=USD');
                $litecoin = json_decode($lit);
                $litecoin_final = $litecoin[0]->price_usd;
                $data['amount_convert'] = $amount_to_convert / $litecoin_final;
                $charge = $setting['withdraw_charge'] / $litecoin_final;
                $data['name'] = 'LTE';
                $data['name_full'] = 'litecoin';
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Litecoin Server Very Busy , Try Again');
                return redirect()->back();
            }
        }
        if ($action == 'ethereum_address') {

            try {
                $eth = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD');
                $ethereum = json_decode($eth);
                $ethereum_final = $ethereum[0]->price_usd;
                $data['amount_convert'] = $amount_to_convert / $ethereum_final;
                $charge = $setting['withdraw_charge'] / $ethereum_final;
                $data['name'] = 'ETH';
                $data['name_full'] = 'ethereum';
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Ethereum Server Very Busy , Try Again');
                return redirect()->back();
            }
        }
        if ($action == 'bitcoin_cash_address') {
            //bitcoin cash
            try {
                $btic_cash = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/?convert=USD');
                $dash = json_decode($btic_cash);
                $cash_final = $dash[0]->price_usd;
                $data['amount_convert'] = $amount_to_convert / $cash_final;
                $charge = $setting['withdraw_charge'] / $cash_final;
                $data['name'] = 'BTC Cash';
                $data['name_full'] = 'bitcoin-cash';
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Bitcoin Cash Server Very Busy , Try Again');
                return redirect()->back();
            }
        }
        if ($action == 'dash_address') {

            //dash
            try {
                $da = file_get_contents('https://api.coinmarketcap.com/v1/ticker/dash/?convert=USD');
                $dash = json_decode($da);
                $dash_final = $dash[0]->price_usd;
                $data['amount_convert'] = $amount_to_convert / $dash_final;
                $charge = $setting['withdraw_charge'] / $dash_final;
                $data['name'] = 'dash';
                $data['name_full'] = 'dash';
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Dash Cash Server Very Busy , Try Again');
                return redirect()->back();
            }
        }
        foreach ($withdraw->user->coin as $ucoin) {
            if ($withdraw->coin_id == $ucoin->coin_id) {

                $address = $ucoin->address;
            }
        }
        //maual withdraw 
        if ($on == false) {
            //send mail
            $greeting = 'Hello' . ' ' . $withdraw->user->full_name;
            $email = $withdraw->user->email;
            $subject = 'Withdrawal has been Confirmed ';
            $text = "You Iniated an Automatic withdrawal of  " . "$" . $withdraw->amount;
            $message = $text . ' from ' . $name . ' Wait for your fund to arrive in your  ' . $name . " account " . $address . ' We will notify you once fund is confirmed Withdrawal';
            Withdraw::whereId($request->withdraw)->update([
                'confirm' => true
            ]);
            Notification::route('mail', $email)
                    ->notify(new SendNotifyMail($subject, $greeting, $message));
        } else {
            //auto withdraw 
            $ch = number_format(floatval($charge), 8, '.', '');
            try {
                $block_io->withdraw_from_addresses(array('amounts' => $withdraw->amount_check, $ch, 'from_addresses' => $site_address, 'to_addresses' => $address));
            } catch (\Exception $e) {
                Withdraw::whereId($withdraw->id)->delete();
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'No Fund in our wallet now, please try again later');
                return redirect()->back();
            }
            Withdraw::whereId($request->withdraw)->update([
                'confirm' => true
            ]);
            //send mail
            $greeting = 'Hello' . ' ' . $withdraw->user->full_name;
            $email = $withdraw->user->email;
            $subject = 'Withdrawal has been Confirmed ';
            $text = "You Iniated an Automatic withdrawal of  " . "$" . $withdraw->amount;
            $message = $text . ' from ' . $name . ' Wait for Confirmation in BlockChain ' . $name . " account " . $address . ' We will notify you once Blockchain Confirmed Your Withdrawal';
            Notification::route('mail', $email)
                    ->notify(new SendNotifyMail($subject, $greeting, $message));
        }


        session()->flash('message.level', 'success');
        session()->flash('message.color', 'success');
        session()->flash('message.content', 'Withdrawal Successfully Confirmed');
        return redirect()->back();
    }

    public function depositList() {
        $data['plans'] = Plan::all();
        $data['deposits'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
         $data['total_deposit'] = Investment::whereUser_id(Auth::user()->id)->whereStatus_deposit(1)->sum('amount');
        return view('user.deposit_list', $data);
    }

    public function depositHistory(Request $request) {
        $data['coins'] = Coin::all();
        $data['histories'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
        $data['type'] = 'Deposit';
        return view('user.deposit_history', $data);
    }

    public function withdrawHistory(Request $request) {
        $data['coins'] = Coin::all();
        $data['histories'] = Withdraw::whereUser_id(Auth::user()->id)->paginate(15);
        $data['type'] = 'withdrawal';
        return view('user.withdraw_history', $data);
    }

    public function earnings(Request $request) {
        $data['coins'] = Coin::all();
        $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->paginate(15);
        $data['type'] = null;
        return view('user.withdraw_history', $data);
    }

    public function getHistory(Request $request) {

        $data['coins'] = Coin::all();
        if ($request->type == null) {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
            $data['type'] = '';
        }
        if ($request->type == 'deposit') {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereType('Deposit Investment')->paginate(15);
            $data['type'] = 'Deposit';
        }
        if ($request->type == 'bonus') {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereType('Bonus')->paginate(15);
            $data['type'] = 'bonus';
        }
        if ($request->type == 'earning') {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereType('Earning')->paginate(15);
            $data['type'] = 'earning';
        }

        if ($request->type == 'withdrawal') {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereType('Withdraw')->paginate(15);
            $data['type'] = 'withdrawal';
        }
        if ($request->type == 'early_deposit_release') {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereType('Early Deposit Release')->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->paginate(15);
            $data['type'] = 'early_deposit_release';
        }
        if ($request->type == 'release_deposit') {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereType('Early Deposit Release')->paginate(15);
            $data['type'] = 'release_deposit';
        }
        if ($request->type == 'commissions') {
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereType('Commissions')->paginate(15);
            $data['type'] = 'commissions';
        }
        if ($request->type == 'bitcoin_address') {
            $coin = Coin::whereSlug('bitcoin_address')->first();
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereCoin_id($coin->id)->paginate(15);
            $data['type'] = 'bitcoin_address';
        }
        if ($request->type == 'litecoin_address') {
            $coin = Coin::whereSlug('litecoin_address')->first();
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereCoin_id($coin->id)->paginate(15);
            $data['type'] = 'litecoin_address';
        }
        if ($request->type == 'ethereum_address') {
            $coin = Coin::whereSlug('ethereum_address')->first();
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereCoin_id($coin->id)->paginate(15);
            $data['type'] = 'ethereum_address';
        }

        if ($request->type == 'bitcoin_cash_address') {
            $coin = Coin::whereSlug('bitcoin_cash_address')->first();
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereCoin_id($coin->id)->paginate(15);
            $data['type'] = 'bitcoin_cash_address';
        }

        if ($request->type == 'dash_address') {
            $coin = Coin::whereSlug('dash_address')->first();
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->whereCoin_id($coin->id)->paginate(15);
            $data['type'] = 'dash_address';
        }
        if ($request->type == 1) {

            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
            $data['type'] = 1;
        }
        if ($request->type == 'filter') {
            $from = $request->year_from . '-' . $request->month_from . '-' . $request->day_from;

            $to = $request->year_to . '-' . $request->month_to . '-' . $request->day_to;
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->whereType('Deposit Investment')->whereBetween('created_at', [$from, $to])->orderBy('created_at', 'desc')->paginate(15);
            $data['type'] = 'date';
        }
        if ($request->type == 'filterw') {
            $from = $request->year_from . '-' . $request->month_from . '-' . $request->day_from;

            $to = $request->year_to . '-' . $request->month_to . '-' . $request->day_to;
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->whereBetween('created_at', [$from, $to])->whereType('Withdraw')->orderBy('created_at', 'desc')->paginate(15);
            $data['type'] = 'date';
        }
        if ($request->type == 'filtere') {
            $from = $request->year_from . '-' . $request->month_from . '-' . $request->day_from;

            $to = $request->year_to . '-' . $request->month_to . '-' . $request->day_to;
            $data['histories'] = Transaction::whereUser_id(Auth::user()->id)->whereBetween('created_at', [$from, $to])->orderBy('created_at', 'desc')->paginate(15);
            $data['type'] = 'date';
        }
        if ($request->type == 'filterw') {
            return view('user.withdraw_history', $data);
        }
        if ($request->type == 'filtere') {
            return view('user.earnings', $data);
        }
        return view('user.deposit_history', $data);
    }

    public function referals() {
        $data['ref'] = Reference::whereUser_id(Auth::user()->id)->with('refs')->get();

        $ref = Reference::whereUser_id(Auth::user()->id)->select('referred_id')->pluck('referred_id');
        $ddd = Investment::whereIn('user_id', $ref)->whereStatus_deposit(1)->get();
        $data['active'] = $ddd->groupBy('user_id')->count();
        $data['commission'] = UserCoin::whereUser_id(Auth::user()->id)->sum('bonus');
        return view('user.referals', $data);
    }

    public function referalsLink() {
        return view('user.referallinks');
    }

    public function edit() {
        $coinsbtc = Coin::whereSlug('bitcoin_address')->first();
        $data['bitcoin'] = UserCoin::whereUser_id(Auth::user()->id)->whereCoin_id($coinsbtc->id)->pluck('address')->first();
       
        return view('user.edit_account', $data);
    }

    public function editPost(Request $request) {

        $input = $request->all();

        if (!empty($request->password)) {
            $rules = ([
                'password' => ['required', 'string', 'min:8'],
                'confirm_password' => 'required|same:password'
            ]);
        }
        if (!empty($request->bitcoin_address)) {
            $rules = ([
                'bitcoin_address' => 'regex:/^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$/'
            ]);
        }
        if (!empty($request->litecoin_address)) {
            $rules = ([
                'litecoin_address' => 'regex:/^[LM3][a-km-zA-HJ-NP-Z1-9]{25,34}$/'
            ]);
        }

        if (!empty($request->ethereum_address)) {
            $rules = ([
                'ethereum_address' => 'regex:/^(0x)?[0-9a-fA-F]{40}$/'
            ]);
        }
        if (!empty($request->bitcoin_cash_address)) {
            $rules = ([
                'bitcoin_cash_address' => 'regex:/^[\w\d]{25,43}$/'
            ]);
        }
        if (!empty($request->dash_address)) {
            $rules = ([
                'dash_address' => 'regex:/^X[0-9a-zA-Z]{33}$/'
            ]);
        }

        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if (!empty($request->bitcoin_address)) {

            $coin = Coin::whereSlug('bitcoin_address')->first();
            $usercoin = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $coin->id));
            $usercoin->user_id = Auth::user()->id;
            $usercoin->coin_id = $coin->id;
            $usercoin->address = $request->bitcoin_address;
            $usercoin->amount = 0;
            $usercoin->save();
        }
        if (!empty($request->litecoin_address)) {
            $coin = Coin::whereSlug('litecoin_address')->first();
            $usercoin = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $coin->id));
            $usercoin->user_id = Auth::user()->id;
            $usercoin->coin_id = $coin->id;
            $usercoin->address = $request->litecoin_address;
            $usercoin->amount = 0;
            $usercoin->save();
        }

        if (!empty($request->ethereum_address)) {
            $coin = Coin::whereSlug('ethereum_address')->first();
            $usercoin = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $coin->id));
            $usercoin->user_id = Auth::user()->id;
            $usercoin->coin_id = $coin->id;
            $usercoin->address = $request->ethereum_address;
            $usercoin->amount = 0;
            $usercoin->save();
        }
        if (!empty($request->bitcoin_cash_address)) {
            $coin = Coin::whereSlug('bitcoin_cash_address')->first();
            $usercoin = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $coin->id));
            $usercoin->user_id = Auth::user()->id;
            $usercoin->coin_id = $coin->id;
            $usercoin->address = $request->bitcoin_cash_address;
            $usercoin->amount = 0;
            $usercoin->save();
        }
        if (!empty($request->dash_address)) {
            $coin = Coin::whereSlug('dash_address')->first();
            $usercoin = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $coin->id));
            $usercoin->user_id = Auth::user()->id;
            $usercoin->coin_id = $coin->id;
            $usercoin->address = $request->dash_address;
            $usercoin->amount = 0;
            $usercoin->save();
        }
        $user = User::firstOrNew(array('id' => (Auth::user()->id)));
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->save();
        if (!empty($request->password)) {
            $user = User::firstOrNew(array('id' => (Auth::user()->id)));
            $user->password = bcrypt($request->password);
            $user->save();
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Data Successfully Saved');
        return redirect()->back();
    }

}
