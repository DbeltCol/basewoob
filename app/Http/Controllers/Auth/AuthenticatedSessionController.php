<?php

namespace App\Http\Controllers\Auth;

use App\Events\LastLogin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\TwoFactorRequest;
use App\Models\TwoFactor;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {


        $request->authenticate();
        $request->session()->regenerate();


        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        //save last login date
        event(new LastLogin(auth()->user()));

        auth()->user()->update([
            'two_factor' => NULL
        ]);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function autenticateToken(TwoFactorRequest $request)
    {

        $twoFactor = TwoFactor::where('token', $request->token)->where('user_id', auth()->user()->id)->where('state','pending')->first();

        if (!$twoFactor) {
            return back()->with('status_danger', "El token ingresado es incorrecto");
        }

        if (isset($twoFactor) && Carbon::parse($twoFactor->expired_at) > Carbon::now()) {
            return back()->with('status_danger', "El token ha expirado");
        }

        $twoFactor->update([
            'state' => 'approve'
        ]);

        auth()->user()->update([
            'two_factor' => Carbon::now()
        ]);

        return redirect('/dashboard');


    }
}
