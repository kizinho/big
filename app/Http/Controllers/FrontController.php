<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Traits\HasError;
use App\Models\Admin\Setting;
use App\ContactUs;
use Illuminate\Support\Facades\Notification;
use App\Mail\ContactUsMail;
use App\Mail\SubscriberMail;
use App\EmailSubscriber;
use App\Plan;
use App\Investment;
use App\Withdraw;

class FrontController extends Controller {

    use HasError;

    public function index() {
        $data['deposits'] = Investment::whereStatus_deposit(1)->orderBy('created_at', 'desc')->take(10)->get();
        $data['withdraws'] = Withdraw::whereStatus(1)->orderBy('created_at', 'desc')->take(10)->get();
        return view('welcome', $data);
    }

    public function contact(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string']
        ]);
        $error = static::getErrorMessage($input, $rules);
        if ($error) {
            return $error;
        }

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $setting = Setting::whereId(1)->first();
        ContactUs::create($input);
        $subject = 'Contact Us Notification';
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        Notification::route('mail', $setting['send_notify_email'])
                ->notify(new ContactUsMail($subject, $name, $email, $message));
        return [
            'status' => 200,
            'message' => 'Message Sent, We will get back to You',
        ];
    }

    public function sub(Request $request) {
        $input = $request->all();
        $rules = ([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:email_subscribers']
        ]);
        $error = static::getErrorMessage($input, $rules);
        if ($error) {
            return $error;
        }
        EmailSubscriber::create($input);
        $subject = 'Subscription for Newsletter for Dailly Offer was Successfull';
        $message = "You can now keep receiving new offer Bonus directly to your email.";
        Notification::route('mail', $request->email)
                ->notify(new SubscriberMail($subject, $message));
        return [
            'status' => 200,
            'message' => 'Subscription for Newsletter for Dailly Offer was Successfull',
        ];
    }

    public function plan() {
        $data['plans'] = Plan::all();
        return view('pages.plan', $data);
    }

}
