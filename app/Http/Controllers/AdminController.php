<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\User;
use \App\Http\Controllers\Traits\HasError;
use Illuminate\Support\Carbon;
use App\Coin;
use App\UserCoin;
use Illuminate\Support\Facades\Notification;
use App\Mail\RegistrationMail;
use App\Investment;
use App\Mail\PlanDepositMail;
use App\Withdraw;
use App\Mail\SendNotifyMail;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use App\Plan;
use App\Compound;
use Illuminate\Support\Str;
use App\TraitsFolder\MailTrait;
use App\Reference;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    use HasError,
        MailTrait;

    public function setting() {
        $data['setting'] = Setting::whereId(1)->first();
        return view('admin.setting.index', $data);
    }

    public function users() {
        $data['users'] = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', $data);
    }

    public function viewUser(Request $request) {
        $id = $request->id;
        $data['user'] = User::find($id);
        $data['usercoin'] = UserCoin::whereUser_id($id)->get();

        return view('admin.users.view', $data);
    }

    public function mailing() {
        return view('admin.mailing.index');
    }

    public function mailingPost(Request $request) {
        $input = $request->all();
        $rules = ([
            'emails' => 'required',
            'title' => 'required',
            'message' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        $var = explode(',', $request->emails);
        foreach ($var as $email) {
            $text = nl2br($request->message);
            $this->sendMail($email, $email, $request->title, $text);
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Mail Successfully Sent');
        return redirect()->back();
    }

    public function login(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        Auth::login($user);
        return redirect('/home');
    }

    public function settingPost(Request $request) {
        $setting = Setting::firstOrNew(array('id' => (1)));
        $setting->site_name = $request->site_name;
        $setting->site_url = $request->site_url;
        $setting->site_email = $request->site_email;
        $setting->send_notify_email = $request->send_notify_email;
        $setting->ref_percentage = $request->ref_percentage;
        $setting->address = $request->address;
        $setting->site_code = $request->site_code;
        $setting->location = $request->location;
        $setting->video_link = $request->video_link;
        $setting->copy_right = $request->copy_right;
        $setting->deposit_investment_charge = $request->deposit_investment_charge;
        $setting->withdraw_charge = $request->withdraw_charge;
        $setting->send_notify_email = $request->send_notify_email;
        $setting->send_notify_email = $request->send_notify_email;
        $setting->investment_payment_mode = $request->mode;
        $setting->email_body = $request->email_body;
        $setting->site_phone = $request->site_phone;
        $setting->min_withdraw = $request->min_withdraw;
        $setting->block_io_pin = $request->block_io_pin;
        $setting->auto_withdraw = $request->auto_withdraw;


        $setting->save();
        if (!empty($request->logo)) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $rand = 'logo';
                $name = $rand . '.' . $extension;
                $file->move(public_path('/images/logo'), $name);
                $save = 'images/logo/' . $name;
                $setting = Setting::firstOrNew(array('id' => (1)));
                $setting->logo = $save;
                $setting->save();
            }
        }
        if (!empty($request->favicon)) {
            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                $extension = $file->getClientOriginalExtension();
                $rand = 'favicon';
                $name = $rand . '.' . $extension;
                $file->move(public_path('/images/favicon'), $name);
                $save = 'images/favicon/' . $name;
                $setting = Setting::firstOrNew(array('id' => (1)));
                $setting->logo = $save;
                $setting->save();
            }
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Site Settings Data Successfully Saved');
        return redirect()->back();
    }

    public function create(Request $request) {
        $input = $request->all();
        $rules = ([
            'full_name' => 'required|string',
            'username' => 'required|unique:users',
            'type' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required'
        ]);
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
        $input['password'] = bcrypt($request->password);
        $input['email_verified_at'] = Carbon::now();
        $user = User::create($input);
        if (!empty($request->bitcoin_address)) {
            $coin = Coin::whereSlug('bitcoin_address')->first();
            UserCoin::create([
                'user_id' => $user->id,
                'coin_id' => $coin->id,
                'amount' => 0,
                'address' => $request->bitcoin_address
            ]);
        }
        if (!empty($request->litecoin_address)) {
            $coin = Coin::whereSlug('litecoin_address')->first();
            UserCoin::create([
                'user_id' => $user->id,
                'coin_id' => $coin->id,
                'amount' => 0,
                'address' => $request->litecoin_address
            ]);
        }

        if (!empty($request->ethereum_address)) {
            $coin = Coin::whereSlug('ethereum_address')->first();
            UserCoin::create([
                'user_id' => $user->id,
                'coin_id' => $coin->id,
                'amount' => 0,
                'address' => $request->ethereum_address
            ]);
        }
        if (!empty($request->bitcoin_cash_address)) {
            $coin = Coin::whereSlug('bitcoin_cash_address')->first();
            UserCoin::create([
                'user_id' => $user->id,
                'coin_id' => $coin->id,
                'amount' => 0,
                'address' => $request->bitcoin_cash_address
            ]);
        }
        if (!empty($request->dash_address)) {
            $coin = Coin::whereSlug('dash_address')->first();
            UserCoin::create([
                'user_id' => $user->id,
                'coin_id' => $coin->id,
                'amount' => 0,
                'address' => $request->dash_address
            ]);
        }
        $setting = Setting::whereId(1)->first();
        $full_name = $request->full_name;
        $subject = "Registration Info";
        $username = $request->username;
        $password = $request->password;
        Notification::route('mail', $setting['site_email'])
                ->notify(new RegistrationMail($full_name, $subject, $username, $password));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'User Successfully Created');
        return redirect()->back();
    }

    public function edit(Request $request) {

        return static::toUpdate($request);
    }

    public static function toUpdate(Request $request) {

        $input = $request->all();

        $user = User::findOrFail($request->id);
        $user->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'User  Successfully Updated');
        return redirect()->back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $array = array($id);
        //deposit
        Investment::whereIn('user_id', $array)->delete();
        Withdraw::whereIn('user_id', $array)->delete();
        UserCoin::whereIn('user_id', $array)->delete();
        Transaction::whereIn('user_id', $array)->delete();
        Reference::whereIn('user_id', $array)->delete();
        Reference::whereIn('referred_id', $array)->delete();
        $user = User::find($id);


        if ($user->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'User deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'User Delete failed');
            return redirect()->back();
        }
    }

    public function deposit(Request $request) {
        if ($request->type == '') {
            $data['deposits'] = Investment::orderBy('created_at', 'desc')->get();
            $data['type'] = '';
        }
        if ($request->type == 'running') {
            $data['deposits'] = Investment::where('due_pay', '>', Carbon::now())->orderBy('created_at', 'desc')->get();
            $data['type'] = 'running';
        }
        if ($request->type == 'completed') {
            $data['deposits'] = Investment::whereStatus(true)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'completed';
        }
        if ($request->type == 'confirmed') {
            $data['deposits'] = Investment::whereStatus_deposit(true)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'confirmed';
        }
        if ($request->type == 'pending') {
            $data['deposits'] = Investment::whereStatus_deposit(false)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'pending';
        }
        return view('admin.deposit.index', $data);
    }

    public function deleteDeposit(Request $request) {
        $id = $request->id;
        $deposit = Investment::find($id);
        if ($deposit->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Deposit deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Deposit Delete failed');
            return redirect()->back();
        }
    }

    public function confirm(Request $request) {
        $id = $request->id;
        $payment = Investment::find($id);
        $current = Carbon::now();
        $status_deposit = true;
        $due = $current->addHours($payment->plan->compound->compound);
        $due_pay = $due->addMinutes(2);
        $payment->update([
            'status_deposit' => $status_deposit,
            'due_pay' => $due_pay
        ]);
        if ($payment->plan->name == 'PLAN 6') {
            $namep = $payment->amount . ' BTC';
        } else {
            $namep = '$' . $payment->amount;
        }
        $action = $payment->coin->slug;
        if ($action == 'bitcoin_address') {
            $name = 'BTC';
        }
        if ($action == 'litecoin_address') {

            $name = 'LTE';
        }
        if ($action == 'ethereum_address') {
            $name = 'ETH';
        }
        if ($action == 'bitcoin_cash_address') {
            $name = 'BTC Cash';
        }
        if ($action == 'dash_address') {
            $name = 'dash';
        }

        //check reference for bouns
        $actionb = $payment->coin->slug;
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
                    'transaction_id' => $payment->transaction_id,
                    'type' => 'Commissions',
                    'name_type' => 'Referral Bonus',
                    'coin_id' => $payment->coin_id,
                    'amount' => $bonus,
                    'amount_profit' => $bonus,
                    'description' => 'Referral Bonus Under ' . $payment->plan->name
                ]);
                $message = '$' . $bonus . " Referral Bonus has been successfully sent your " . $name . " account " . $address . '.' . " Transaction ID Is : #$payment->transaction_id";

                $text = $message;
                $this->sendMail($pay->user->email, $pay->user->full_name, 'Referral Bonus.', $text);
            }
        }




        $email = $payment->user->email;
        $subject = 'New investment';
        $message = '$' . $payment->amount . ' ' . $name . " Invest Under " . $payment->plan->name . " Transaction ID Is : #$payment->transaction_id";
        $this->sendMail($email, $payment->user->full_name, $subject, $message);

        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Payment Successfully Confirmed');
        return redirect()->back();
    }

    public function withdraw(Request $request) {
        if ($request->type == '') {
            $data['withdraws'] = Withdraw::orderBy('created_at', 'desc')->get();
            $data['type'] = '';
        }
        if ($request->type == 'pending') {
            $data['withdraws'] = Withdraw::whereStatus(false)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'pending';
        }
        if ($request->type == 'completed') {
            $data['withdraws'] = Withdraw::whereStatus(true)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'completed';
        }

        return view('admin.withdraw.index', $data);
    }

    public function deleteWithdraw(Request $request) {
        $id = $request->id;

        $withdraw = Withdraw::find($id);


        if ($withdraw->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Withdraw deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Withdraw Delete failed');
            return redirect()->back();
        }
    }

    public function confirmWithdraw(Request $request) {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $withdraw = Withdraw::find($id);
            $withdraw->update([
                'status' => true,
                'status_withdraw' => true
            ]);
            $action = $withdraw->coin->slug;
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
            $amount = $withdraw->amount - $withdraw->withdraw_charge;
            foreach ($withdraw->user->coin as $ucoin) {
                if ($withdraw->coin_id == $ucoin->coin_id) {

                    $address = $ucoin->address;
                }
            }
            $sub = UserCoin::whereUser_id($withdraw->user_id)->whereCoin_id($withdraw->coin_id)->first();
            if ($withdraw->withdraw_from == 'Balance') {
                $sub->update([
                    'amount' => $sub->amount - $withdraw->total_amount
                ]);
            }
            if ($withdraw->withdraw_from == 'Profit') {
                $sub->update([
                    'earn' => $sub->earn - $withdraw->total_amount
                ]);
            }
            if ($withdraw->withdraw_from == 'Referal Bonus') {
                $s = $sub->bonus - $withdraw->total_amount;
                $sub = UserCoin::whereUser_id($withdraw->user_id)->whereCoin_id($withdraw->coin_id)->update([
                    'bonus' => $s
                ]);
            }

            if ($withdraw->withdraw_from == 'all') {
                $s = $sub->bonus - $withdraw->total_amount;
                $sub = UserCoin::whereUser_id($withdraw->user_id)->whereCoin_id($withdraw->coin_id)->update([
                    'bonus' => 0,
                    'earn' => 0,
                    'amount' => 0,
                ]);
            }
            $message = '$' . $amount . " has been successfully sent to your " . $name . " account " . $address . '.' . " Transaction ID Is : #$withdraw->transaction_id";

//transcation log
            Transaction::create([
                'user_id' => $withdraw->user_id,
                'transaction_id' => $withdraw->transaction_id,
                'type' => 'Withdraw',
                'name_type' => 'Fund Sent',
                'withdraw_charge' => $withdraw->withdraw_charge,
                'coin_id' => $withdraw->coin_id,
                'amount' => $withdraw->amount - $withdraw->withdraw_charge,
                'description' => $message
            ]);
            //send mail
            $greeting = 'Hello' . ' ' . $withdraw->user->full_name;
            $email = $withdraw->user->email;
            $subject = 'Withdrawal has been sent';


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        Notification::route('mail', $email)
                ->notify(new SendNotifyMail($subject, $greeting, $message));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Withdraw successfully Paid');
        return redirect()->back();
    }

    public function rejectWithdraw(Request $request) {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $withdraw = Withdraw::find($id);
            $withdraw->update([
                'status_withdraw' => true
            ]);
            $sub = UserCoin::whereUser_id($withdraw->user_id)->whereCoin_id($withdraw->coin_id)->first();
            if ($withdraw->withdraw_from == 'Balance') {
                $sub->update([
                    'amount' => $sub->amount + $withdraw->amount
                ]);
            }
            if ($withdraw->withdraw_from == 'all') {
                $sub->update([
                    'amount' => $sub->amount + $withdraw->amount
                ]);
            }
            if ($withdraw->withdraw_from == 'Profit') {
                $sub->update([
                    'earn' => $sub->earn + $withdraw->amount
                ]);
            }
            if ($withdraw->withdraw_from == 'Referal Bonus') {
                $sub = UserCoin::whereUser_id($withdraw->user_id)->whereCoin_id($withdraw->coin_id)->update([
                    'bonus' => $sub->bonus + $withdraw->amount
                ]);
            }
            $action = $withdraw->coin->slug;
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
            $amount = $withdraw->amount - $withdraw->withdraw_charge;
            foreach ($withdraw->user->coin as $ucoin) {
                if ($withdraw->coin_id == $ucoin->coin_id) {

                    $address = $ucoin->address;
                }
            }

            $message = '$' . $amount . " has been Rejected back to your  " . $name . ' ' . $withdraw->withdraw_from . " account " . $address . '.' . " Transaction ID Is : #$withdraw->transaction_id";

//transcation log
            Transaction::create([
                'user_id' => $withdraw->user_id,
                'transaction_id' => $withdraw->transaction_id,
                'type' => 'Withdraw',
                'name_type' => 'Refund Back',
                'withdraw_charge' => $withdraw->withdraw_charge,
                'coin_id' => $withdraw->coin_id,
                'amount' => $withdraw->amount - $withdraw->withdraw_charge,
                'description' => $message
            ]);
            //send mail
            $greeting = 'Hello' . ' ' . $withdraw->user->full_name;
            $email = $withdraw->user->email;
            $subject = 'Withdrawal has been Rejected';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        Notification::route('mail', $email)
                ->notify(new SendNotifyMail($subject, $greeting, $message));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Withdraw successfully Rejected');
        return redirect()->back();
    }

    public function planSetting() {
        $data['compounds'] = Compound::all();
        $data['plans'] = Plan::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.plan', $data);
    }

    public function addPlan(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => 'required|unique:plans',
            'ref' => 'required',
            'percentage' => 'required',
            'min' => 'required',
            'max' => 'required',
            'compound_id' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        Plan::create($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Plan successfully Created');
        return redirect()->back();
    }

    public function deletePlan(Request $request) {
        $id = $request->id;
        $plan = Plan::find($id);
        if ($plan->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Plan deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Plan Delete failed');
            return redirect()->back();
        }
    }

    public function editPlan(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $plan = Plan::find($id);
        $rules = ([
            'name' => 'required',
            'ref' => 'required',
            'percentage' => 'required',
            'min' => 'required',
            'max' => 'required',
            'compound_id' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $plan->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Plan successfully Updated');
        return redirect()->back();
    }

    public function compoundSetting() {
        $data['compounds'] = Compound::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.compound', $data);
    }

    public function addCompound(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => 'required|unique:compounds',
            'compound' => 'required|unique:compounds'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        Compound::create($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Compound successfully Created');
        return redirect()->back();
    }

    public function deleteCompound(Request $request) {
        $id = $request->id;
        $compound = Compound::find($id);
        if ($compound->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Compound deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Compound Delete failed');
            return redirect()->back();
        }
    }

    public function editCompound(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $compound = Compound::find($id);
        $rules = ([
            'name' => 'required',
            'compound' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $compound->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Compound successfully Updated');
        return redirect()->back();
    }

    public function coinSetting() {
        $data['coins'] = Coin::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.coin', $data);
    }

    public function addCoin(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => 'required|unique:coins',
            'address' => 'required|unique:coins'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $input['slug'] = str_slug($request->name, '_');

        if (!empty($request->photo)) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins'), $name);
                $save = 'coins/' . $name;
                $input['photo'] = $save;
            }
        }
        if (!empty($request->q_code)) {
            if ($request->hasFile('q_code')) {
                $file = $request->file('q_code');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins/qcode'), $name);
                $save = 'coins/qcode/' . $name;
                $input['q_code'] = $save;
            }
        }


        Coin::create($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Coin successfully Created');
        return redirect()->back();
    }

    public function deleteCoin(Request $request) {
        $id = $request->id;
        $coin = Coin::find($id);
        if ($coin->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Coin deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Coin Delete failed');
            return redirect()->back();
        }
    }

    public function editCoin(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $coin = Coin::find($id);
        $rules = ([
            'name' => 'required',
            'address' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $input['slug'] = str_slug($request->name, '_');

        if (!empty($request->photo)) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins'), $name);
                $save = 'coins/' . $name;
                $input['photo'] = $save;
            }
        }
        if (!empty($request->q_code)) {
            if ($request->hasFile('q_code')) {
                $file = $request->file('q_code');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins/qcode'), $name);
                $save = 'coins/qcode/' . $name;
                $input['q_code'] = $save;
            }
        }

        $coin->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Coin successfully Updated');
        return redirect()->back();
    }

    public function fund(Request $request) {
        $input = $request->all();
        $rules = ([
            'type' => 'required',
            'coin' => 'required',
            'amount' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        DB::beginTransaction();
        try {
            $amount = $request->amount;
            if ($request->type == 'bonus') {
                $type_name = 'Bonus';
            }
            if ($request->type == 'add') {
                $type_name = 'Added';
            }
            if ($request->type == 'substract') {
                $type_name = 'Substracted';
            }

            if ($request->coin == 'all') {

                $usercoin = UserCoin::whereUser_id($request->user_id)->get();
                foreach ($usercoin as $ucoin) {
                    $action = $ucoin->coin->slug;
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


                    $message = '$' . $amount . " has been  " . $type_name . ' to your ' . $name . ' ' . " account " . $ucoin->address;
                    if ($request->type == 'bonus' || $request->type == 'add') {
                        $ucoin->update([
                            'amount' => $ucoin->amount + $request->amount
                        ]);
                        //transcation log
                        Transaction::create([
                            'user_id' => $request->user_id,
                            'transaction_id' => strtoupper(Str::random(20)),
                            'type' => 'Bonus',
                            'name_type' => $type_name,
                            'withdraw_charge' => 0,
                            'coin_id' => $ucoin->coin_id,
                            'amount' => $request->amount,
                            'description' => $message
                        ]);
//                        //send mail
//                        $greeting = 'Hello' . ' ' . $ucoin->user->full_name;
//                        $email = $ucoin->user->email;
//                        $subject = 'Fund Added';
//
//
//                        Notification::route('mail', $email)
//                                ->notify(new SendNotifyMail($subject, $greeting, $message));
                    }

                    if ($request->type == 'substract') {
                        $ucoin->update([
                            'amount' => $ucoin->amount - $request->amount
                        ]);
                    }
                }
            } else {
                $usercoin = UserCoin::whereUser_id($request->user_id)->whereCoin_id($request->coin)->first();
                $action = $usercoin->coin->slug;
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

                $message = '$' . $amount . " has been  " . $type_name . ' to your ' . $name . ' ' . " account " . $usercoin->address;
                if ($request->type == 'bonus' || $request->type == 'add') {
                    $usercoin->update([
                        'amount' => $usercoin->amount + $request->amount
                    ]);
                    //transcation log
                    Transaction::create([
                        'user_id' => $request->user_id,
                        'transaction_id' => strtoupper(Str::random(20)),
                        'type' => 'Bonus',
                        'name_type' => $type_name,
                        'withdraw_charge' => 0,
                        'coin_id' => $usercoin->coin_id,
                        'amount' => $request->amount,
                        'description' => $message
                    ]);
                    //send mail
                    $greeting = 'Hello' . ' ' . $usercoin->user->full_name;
                    $email = $usercoin->user->email;
                    $subject = 'Fund Added';


                    Notification::route('mail', $email)
                            ->notify(new SendNotifyMail($subject, $greeting, $message));
                }

                if ($request->type == 'substract') {
                    $usercoin->update([
                        'amount' => $usercoin->amount - $request->amount
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Fund successfully Proccessed');
        return redirect()->back();
    }

}
