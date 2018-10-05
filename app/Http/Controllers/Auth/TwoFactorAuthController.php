<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\TwoFactorAuthenticationRequest;
use App\TwoFactorAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorAuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function twoFactorAuthentication(Request $request)
    {
        $two_factor_auth = new TwoFactorAuth($request->user());
        return view('auth.2fa', [
            'two_factor' => $two_factor_auth
        ]);
    }

    /**
     * @param TwoFactorAuthenticationRequest $request
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function twoFactorAuthenticationValidate(TwoFactorAuthenticationRequest $request)
    {
        $google2fa = new Google2FA();

        if ($google2fa->verifyKey($request->secret_key, $request->one_time_password)) {
            $request->session()->put('two_factor_authenticated', true);
            return redirect('/home');
        }

        return redirect()->back()->with([
            'invalid' => "Invalid OPT"
        ]);
    }
}
