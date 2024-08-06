<?php

namespace App\Http\Controllers\Auth;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\Email\EmailService;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm()
    {
        return view('assets.auth.login-register');
    }
    public function LoginRegister(Request $request)
    {
        // $validatedData=$request->validate([
        //     'id'=>'required|min:11|max:64|regex:/^[a-zA-Z0-9_.@\+]*$/',
        // ]);

        $inputs = $request->all();

        //check id is email or not
        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 => email
            $user = User::where('email', $inputs['id'])->first();
            if (empty($user)) {
                $newUser['email'] = $inputs['id'];
            }
        } else {
            $errorText = "شناسه ورودی شما ایمیل نیست";
            return redirect()->route('auth.login-register-form')->withErrors(['id' => $errorText]);
        }
        if (empty($user)) {
            $newUser['activation'] = 1;
            $user = User::create($newUser);
        }

        //create otp code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $inputs['id'],
            'type' => $type,
        ];

        Otp::create($otpInputs);

        if ($type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('baharradman4748@gmail.com', 'example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['id']);
            $messagesService = new MessageService($emailService);
        }

        $messagesService->send();
        return redirect()->route('auth.login-confirm-form', $token);
    }
    
    public function loginConfirmForm($token)
    {

        $otp = Otp::where('token', $token)->first();
        if (empty($otp)) {
            return redirect()->route('auth.login-register-form')->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        return view('assets.auth.login-confirm', compact('token', 'otp'));
    }

    public function loginConfirm($token, Request $request)
    {
        $validatedData = $request->validate([
            'otp' => 'required|min:6|max:6',
        ]);
        $inputs = $request->all();

        $otp = Otp::where('token', $token)->where('used', 0)->where('created_at', '>=', now()->subMinute(5)->toDateTimeString())->first();
        if (empty($otp)) {
            return redirect()->route('auth.login-register-form', $token)->withErrors(['id' => 'منقضی شده یا آدرس وارد شده نامعتبر میباشد']);
        }

        //if otp not match
        if ($otp->otp_code !== $inputs['otp']) {
            return redirect()->route('auth.login-confirm-form', $token)->withErrors(['otp' => 'کد وارد شده صحیح نمیباشد']);
        }

        // if everything is ok :
        $otp->update(['used' => 1]);
        $user = $otp->user()->first();
        if ($otp->type == 1 && empty($user->email_verified_at)) {
            $user->update(['email_verified_at' => now()]);
        }
        Auth::login($user);
        return redirect()->route('home');
    }
    public function loginResendOtp($token)
    {
        $otp = Otp::where('token', $token)->where('created_at', '<=', Carbon::now()->subMinutes(5)->toDateTimeString())->first();

        if (empty($otp)) {
            return redirect()->route('auth.login-register-form', $token)->withErrors(['id' => 'ادرس وارد شده نامعتبر است']);
        }

        $user = $otp->user()->first();
        //create otp code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $otp->login_id,
            'type' => $otp->type,
        ];

        Otp::create($otpInputs);
        if ($otp->type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($otp->login_id['id']);

            $messagesService = new MessageService($emailService);
        }

        $messagesService->send();
        return redirect()->route('auth.login-confirm-form', $token);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
