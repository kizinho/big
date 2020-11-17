<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TraitsFolder\MailTrait;
use App\Investment;
use App\Transaction;
use App\Models\Admin\Setting;
use App\UserCoin;
use App\Reference;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use BlockIo;
use App\Coin;
use App\Withdraw;

class CronJobController extends Controller {

    use MailTrait;

    public function index() {
        $setting = Setting::whereId(1)->first();
        DB::beginTransaction();
        try {
            if ($setting->investment_payment_mode == false) {
                $investments = Investment::whereStatus(0)->whereStatus_deposit(1)->where('updated_at', '<', Carbon::now()->subDay())->get();
                foreach ($investments as $invest) {

                    $action = $invest->coin->slug;
                    if ($action == 'bitcoin_address') {
                        $name = 'Bitcoin';
                    }
                    if ($action == 'litecoin_address') {

                        $name = 'Litecoin';
                    }
                    if ($action == 'ethereum_address') {
                        $name = 'Ethereum';
                    }
                    if ($action == 'bitcoin_cash_address') {
                        $name = 'Bitcoin Cash';
                    }
                    if ($action == 'dash_address') {
                        $name = 'Dash';
                    }
                    foreach ($invest->user->coin as $ucoin) {
                        if ($invest->coin_id == $ucoin->coin_id) {

                            $address = $ucoin->address;
                        }
                    }

                    $c = ($invest->plan->compound->compound / 24);
                    $check = $invest->run_count;
                    if ($check != $c) {

                        $profit = $invest->amount * $invest->plan->percentage / 100;
                        $daily_profit = $profit / $c;
                        //update investment 
                        $update_investment = Investment::findOrFail($invest->id);
                        $update_investment->run_count = $invest->run_count + 1;
                        $update_investment->earn = $invest->earn + $daily_profit;
                        $update_investment->save();
                        //usercoin 
                        $usercoin = UserCoin::whereCoin_id($invest->coin_id)->whereUser_id($invest->user_id)->first();
                        $usercoin->earn = $usercoin->earn + $daily_profit;
                        $usercoin->save();
                        //transcation log
                        Transaction::create([
                            'user_id' => $invest->user_id,
                            'transaction_id' => $invest->transaction_id,
                            'type' => 'Deposit Investment',
                            'name_type' => 'Daily Profit',
                            'coin_id' => $invest->coin_id,
                            'amount' => $daily_profit,
                            'amount_profit' => $daily_profit,
                            'description' => 'You Daily Profit Under ' . $invest->plan->name
                        ]);

                        $message = '$' . $daily_profit . " Daily Profit has been successfully sent to your " . $name . " account " . $address . '.' . " Transaction ID Is : #$invest->transaction_id";
                        $text = $message;
                        $this->sendMail($invest->user->email, $invest->user->full_name, 'Investment  Daily Profit.', $text);
                    } else {

                        //update investment 
                        $update_investment = Investment::findOrFail($invest->id);
                        $update_investment->status = true;
                        $update_investment->save();
                        //usercoin 
                        $usercoin = UserCoin::whereCoin_id($invest->coin_id)->whereUser_id($invest->user_id)->first();
                        $usercoin->amount = $usercoin->amount + $invest->amount;
                        $usercoin->save();
                        //transcation log
                        Transaction::create([
                            'user_id' => $invest->user_id,
                            'transaction_id' => $invest->transaction_id,
                            'type' => 'Deposit Investment',
                            'name_type' => 'Return Investment Amount',
                            'coin_id' => $invest->coin_id,
                            'amount' => $invest->amount,
                            'amount_profit' => $invest->amount,
                            'description' => 'You Investment Amount Returned  Under ' . $invest->plan->name
                        ]);
                        $message = '$' . $invest->amount . " Invested has been successfully sent  back to your " . $name . " account " . $address . '.' . " Transaction ID Is : #$invest->transaction_id";

                        $text = $message;
                        $this->sendMail($invest->user->email, $invest->user->full_name, 'Investment  Daily Profit.', $text);
                    }
                }
            } else {
                $investments = Investment::whereStatus(0)->whereStatus_deposit(1)->where('due_pay', '<', Carbon::now())->get();
//dd($investments);
                foreach ($investments as $invest) {
                    $action = $invest->coin->slug;
                    if ($action == 'bitcoin_address') {
                        $name = 'Bitcoin';
                    }
                    if ($action == 'litecoin_address') {

                        $name = 'Litecoin';
                    }
                    if ($action == 'ethereum_address') {
                        $name = 'Ethereum';
                    }
                    if ($action == 'bitcoin_cash_address') {
                        $name = 'Bitcoin Cash';
                    }
                    if ($action == 'dash_address') {
                        $name = 'Dash';
                    }
                    foreach ($invest->user->coin as $ucoin) {
                        if ($invest->coin_id == $ucoin->coin_id) {

                            $address = $ucoin->address;
                        }
                    }

                    $profitamount = $invest->amount * $invest->plan->percentage / 100;

                    //update investment 
                    $update_investment = Investment::findOrFail($invest->id);
                    $update_investment->status = true;
                    $update_investment->earn = $profitamount;
                    $update_investment->save();
                    //usercoin 
                    $usercoin = UserCoin::whereCoin_id($invest->coin_id)->whereUser_id($invest->user_id)->first();
                    $usercoin->amount = $usercoin->amount + $invest->amount;
                    $usercoin->earn = $usercoin->earn + $profitamount;
                    $usercoin->save();
                    //transcation log profit
                    Transaction::create([
                        'user_id' => $invest->user_id,
                        'transaction_id' => $invest->transaction_id,
                        'type' => 'Deposit Investment',
                        'name_type' => 'Profit Amount',
                        'coin_id' => $invest->coin_id,
                        'amount' => $profitamount,
                        'amount_profit' => $profitamount,
                        'description' => 'You Investment Profit Under ' . $invest->plan->name
                    ]);
                    $message = '$' . $profitamount . " Profit has been successfully sent to your " . $name . " account " . $address . '.' . " Transaction ID Is : #$invest->transaction_id";

                    $text = $message;
                    $this->sendMail($invest->user->email, $invest->user->full_name, 'Investment  Daily Profit.', $text);
                    //transcation log
                    Transaction::create([
                        'user_id' => $invest->user_id,
                        'transaction_id' => $invest->transaction_id,
                        'type' => 'Deposit Investment',
                        'name_type' => 'Return Investment Amount',
                        'coin_id' => $invest->coin_id,
                        'amount' => $invest->amount,
                        'amount_profit' => $invest->amount,
                        'description' => 'You Investment Amount Returned  Under ' . $invest->plan->name
                    ]);
                    $message = '$' . $invest->amount . " Invested has been successfully sent  back to your " . $name . " account " . $address . '.' . " Transaction ID Is : #$invest->transaction_id";

                    $text = $message;
                    $this->sendMail($invest->user->email, $invest->user->full_name, 'Investment  Daily Profit.', $text);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        return 'success';
    }

    public function autoDeposit() {
        $coins = Coin::all();
        foreach ($coins as $coin) {
            $action = $coin->slug;
            if ($action == 'bitcoin_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'received'));
                foreach ($block_auto->data->txs as $data) {
                    if ($data->confidence >= 1 && $data->confirmations >= 3) {
                        $payment = Investment::whereAmount_check($data->amounts_received[0]->amount)->whereStatus_deposit(false)->whereNull('due_pay')->first();
                        if (is_object($payment)) {
                            $current = Carbon::now();
                            $status_deposit = true;
                            $due = $current->addHours($payment->plan->compound->compound);
                            $due_pay = $due->addMinutes(2);
                            $payment->update([
                                'status_deposit' => $status_deposit,
                                'due_pay' => $due_pay,
                                'transaction_id' => $data->txid
                            ]);
                            if ($payment->plan->name == 'PLAN 6') {
                                $namep = $payment->amount . ' BTC';
                            } else {
                                $namep = '$' . $payment->amount;
                            }
                            $action = $payment->coin->slug;
                            $name = 'BTC';

                            //check reference for bouns
                            $nameb = 'Bitcoin';
                            foreach ($payment->user->coin as $ucoin) {
                                if ($payment->coin_id == $ucoin->coin_id) {

                                    $address = $ucoin->address;
                                }
                            }
                            $user_ref = Reference::whereReferred_id($payment->user_id)->first();
                            if (is_object($user_ref)) {
                                //plan ref percentage
                                $bonus = $payment->amount * $payment->plan->ref / 100;
                                $pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($payment->coin_id)->first();
                                if (is_object($pay)) {
                                    $pay->bonus = $pay->bonus + $bonus;
                                    $pay->save();
                                    //transcation log
                                    Transaction::create([
                                        'user_id' => $payment->user_id,
                                        'transaction_id' => $data->txid,
                                        'type' => 'Commissions',
                                        'name_type' => 'Referral Bonus',
                                        'coin_id' => $payment->coin_id,
                                        'amount' => $bonus,
                                        'amount_profit' => $bonus,
                                        'description' => 'Referral Bonus Under ' . $payment->plan->name
                                    ]);
                                    $message = '$' . $bonus . " Referral Bonus has been successfully sent your " . $nameb . " account " . $pay->address . '.' . " Transaction ID Is : #$payment->transaction_id";

                                    $text = $message;
                                    $this->sendMail($pay->user->email, $pay->user->full_name, 'Referral Bonus.', $text);
                                }
                            }




                            $email = $payment->user->email;
                            $url = "https://sochain.com/tx/BTC/" . $data->txid;
                            $message = $namep . " - " . $name . " Invest Under " . $payment->plan->name . " Transaction ID Is : #$data->txid " . "<br/> View on Blockchain : $url";
                            $text = $message;
                            $this->sendMail($email, $payment->user->full_name, 'New Investment', $text);
                        }
                    }
                }
            }
            if ($action == 'litecoin_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'received'));
                foreach ($block_auto->data->txs as $data) {
                    if ($data->confidence >= 1 && $data->confirmations >= 3) {
                        $payment = Investment::whereAmount_check($data->amounts_received[0]->amount)->whereStatus_deposit(false)->whereNull('due_pay')->first();
                        if (is_object($payment)) {
                            $current = Carbon::now();
                            $status_deposit = true;
                            $due = $current->addHours($payment->plan->compound->compound);
                            $due_pay = $due->addMinutes(2);
                            $payment->update([
                                'status_deposit' => $status_deposit,
                                'due_pay' => $due_pay,
                                'transaction_id' => $data->txid
                            ]);
                            if ($payment->plan->name == 'PLAN 6') {
                                $namep = $payment->amount . ' BTC';
                            } else {
                                $namep = '$' . $payment->amount;
                            }
                            $action = $payment->coin->slug;
                            $name = 'LTC';

                            //check reference for bouns
                            $nameb = 'Litecoin';
                            foreach ($payment->user->coin as $ucoin) {
                                if ($payment->coin_id == $ucoin->coin_id) {

                                    $address = $ucoin->address;
                                }
                            }
                            $user_ref = Reference::whereReferred_id($payment->user_id)->first();
                            if (is_object($user_ref)) {
                                //plan ref percentage
                                $bonus = $payment->amount * $payment->plan->ref / 100;
                                $pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($payment->coin_id)->first();
                                if (is_object($pay)) {
                                    $pay->bonus = $pay->bonus + $bonus;
                                    $pay->save();
                                    //transcation log
                                    Transaction::create([
                                        'user_id' => $payment->user_id,
                                        'transaction_id' => $data->txid,
                                        'type' => 'Commissions',
                                        'name_type' => 'Referral Bonus',
                                        'coin_id' => $payment->coin_id,
                                        'amount' => $bonus,
                                        'amount_profit' => $bonus,
                                        'description' => 'Referral Bonus Under ' . $payment->plan->name
                                    ]);
                                    $message = '$' . $bonus . " Referral Bonus has been successfully sent your " . $nameb . " account " . $pay->address . '.' . " Transaction ID Is : #$payment->transaction_id";

                                    $text = $message;
                                    $this->sendMail($pay->user->email, $pay->user->full_name, 'Referral Bonus.', $text);
                                }
                            }


                            $email = $payment->user->email;
                            $url = "https://sochain.com/tx/LTE/" . $data->txid;
                            $message = $namep . " - " . $name . " Invest Under " . $payment->plan->name . " Transaction ID Is : #$data->txid " . "<br/> View on Blockchain : $url";
                            $text = $message;
                            $this->sendMail($email, $payment->user->full_name, 'New Investment', $text);
                        }
                    }
                }
            }
            if ($action == 'ethereum_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'received'));
            }
            if ($action == 'bitcoin_cash_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'received'));
            }
            if ($action == 'dash_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'received'));
            }
        }
    }

    public function autoWithdraw() {
        $coins = Coin::all();
        foreach ($coins as $coin) {
            $action = $coin->slug;
            if ($action == 'bitcoin_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'sent'));

                foreach ($block_auto->data->txs as $data) {
                    if ($data->confidence >= 1 && $data->confirmations >= 3) {
                        $payment = Withdraw::whereAmount_check($data->amounts_sent[0]->amount)->whereConfirm(true)->whereStatus(false)->whereStatus_withdraw(false)->first();
                        if (is_object($payment)) {
                            $payment->update([
                                'status' => true,
                                'status_withdraw' => true,
                                'transaction_id' => $data->txid
                            ]);

                            $action = $payment->coin->slug;
                            $name = 'BTC';

                            foreach ($payment->user->coin as $ucoin) {
                                if ($payment->coin_id == $ucoin->coin_id) {

                                    $address = $ucoin->address;
                                }
                            }
                            $sub = UserCoin::whereUser_id($payment->user_id)->whereCoin_id($payment->coin_id)->first();
                            if ($payment->withdraw_from == 'Balance') {
                                $sub->update([
                                    'amount' => $sub->amount - $payment->total_amount
                                ]);
                            }
                            if ($payment->withdraw_from == 'Profit') {
                                $sub->update([
                                    'earn' => $sub->earn - $payment->total_amount
                                ]);
                            }
                            if ($payment->withdraw_from == 'Referal Bonus') {
                                $s = $sub->bonus - $payment->total_amount;
                                $sub = UserCoin::whereUser_id($payment->user_id)->whereCoin_id($payment->coin_id)->update([
                                    'bonus' => $s
                                ]);
                            }

                            if ($payment->withdraw_from == 'all') {
                                $s = $sub->bonus - $payment->total_amount;
                                $sub = UserCoin::whereUser_id($payment->user_id)->whereCoin_id($payment->coin_id)->update([
                                    'bonus' => 0,
                                    'earn' => 0,
                                    'balance' => 0,
                                ]);
                            }
                            $email = $payment->user->email;
                            $url = "https://sochain.com/tx/BTC/" . $data->txid;
                            $text = "You Iniated an Automatic withdrawal of  " . "$" . $payment->amount;
                            $message = $text . ' from  Bitcoin Address  which was processed successfully to your  Bitcoin  account' . $address . '.' . " Transaction ID Is : #$data->txid" . " <br/> View on Blockchain : $url";

                            $this->sendMail($email, $payment->user->full_name, 'Withdrawal has been Sent', $message);
                        }
                    }
                }
            }
            if ($action == 'litecoin_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'sent'));
                foreach ($block_auto->data->txs as $data) {
                    if ($data->confidence >= 1 && $data->confirmations >= 3) {
                        $payment = Withdraw::whereAmount_check($data->amounts_sent[0]->amount)->whereConfirm(true)->whereStatus(false)->whereStatus_withdraw(false)->first();
                        if (is_object($payment)) {
                            $payment->update([
                                'status' => true,
                                'status_withdraw' => true,
                                'transaction_id' => $data->txid
                            ]);

                            $action = $payment->coin->slug;
                            $name = 'LTE';

                            foreach ($payment->user->coin as $ucoin) {
                                if ($payment->coin_id == $ucoin->coin_id) {

                                    $address = $ucoin->address;
                                }
                            }
                            $sub = UserCoin::whereUser_id($payment->user_id)->whereCoin_id($payment->coin_id)->first();
                            if ($payment->withdraw_from == 'Balance') {
                                $sub->update([
                                    'amount' => $sub->amount - $payment->total_amount
                                ]);
                            }
                            if ($payment->withdraw_from == 'Profit') {
                                $sub->update([
                                    'earn' => $sub->earn - $payment->total_amount
                                ]);
                            }
                            if ($payment->withdraw_from == 'Referal Bonus') {
                                $s = $sub->bonus - $payment->total_amount;
                                $sub = UserCoin::whereUser_id($payment->user_id)->whereCoin_id($payment->coin_id)->update([
                                    'bonus' => $s
                                ]);
                            }

                            if ($payment->withdraw_from == 'all') {
                                $s = $sub->bonus - $payment->total_amount;
                                $sub = UserCoin::whereUser_id($payment->user_id)->whereCoin_id($payment->coin_id)->update([
                                    'bonus' => 0,
                                    'earn' => 0,
                                    'balance' => 0,
                                ]);
                            }
                            $email = $payment->user->email;
                            $url = "https://sochain.com/tx/LTE/" . $data->txid;
                            $text = "You Iniated an Automatic withdrawal of  " . "$" . $payment->amount;
                            $message = $text . ' from  Litecoin Address  which was processed successfully to your  Litecoin  account' . $address . '.' . " Transaction ID Is : #$data->txid" . " <br/> View on Blockchain : $url";

                            $this->sendMail($email, $payment->user->full_name, 'Withdrawal has been Sent', $message);
                        }
                    }
                }
            }
            if ($action == 'ethereum_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'sent'));
            }
            if ($action == 'bitcoin_cash_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'sent'));
            }
            if ($action == 'dash_address') {
                $apiKey = $coin->api_key;
                $version = 2; // API version
                $block_io = new BlockIo($apiKey, $version);
                $block_auto = $block_io->get_transactions(array('type' => 'sent'));
            }
        }
    }

}
