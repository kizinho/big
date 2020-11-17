<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Traits\HasError;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\UserCoin;
use App\Coin;
use DB;
use Illuminate\Support\Facades\Notification;
use App\Mail\RegistrationMail;
use App\Models\Admin\Setting;
use App\Reference;
use App\Mail\SendNotifyMail;

class UserController extends Controller {

    use HasError;

    public function register(Request $request) {
        $input = $request->all();
        $rules = ([
            'full_name' => 'required',
            'username' => ['required', 'string', 'max:15', 'unique:users', 'regex:/^\S*$/u', 'alpha_dash'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'confirm_email' => 'required|same:email',
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => 'required|same:password'
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

        $error = static::getErrorMessage($input, $rules);
        if ($error) {
            return $error;
        }

        DB::beginTransaction();
        try {
            $input['type'] = 'user';
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            if ($request->ref) {
                $owner = User::whereUsername($request->ref)->first();
                if (!is_object($owner)) {
                    return ([
                        'status' => 422,
                        'message' => 'Invalid Ref User'
                    ]);
                }
                //creste
                Reference::create([
                    'user_id' => $owner->id,
                    'referred_id' => $user->id
                ]);
                //send mail
                $greeting = 'Hello' . ' ' . $owner->full_name;
                $email = $owner->email;
                $subject = 'Referral Registration Confirmation';
                $message = $user->full_name . ' Registered on our Site using your Referral Link. ';
                Notification::route('mail', $email)
                        ->notify(new SendNotifyMail($subject, $greeting, $message));
            }
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
            $full_name = $request->full_name;
            $subject = "Registration Info";
            $username = $request->username;
            $password = $request->password;
            Notification::route('mail', $user->email)
                    ->notify(new RegistrationMail($full_name, $subject, $username, $password));
            Auth::login($user);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        return ([
            'status' => 200,
            'message' => 'Registration Completed'
        ]);
    }

}
