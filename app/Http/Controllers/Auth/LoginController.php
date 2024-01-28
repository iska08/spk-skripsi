<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        // if failed
        if (!Auth::validate($credentials)) :
            return back()->with('failed', "Login Failed, Please Try Again");
        endif;
        // autentikasi user
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));
        return $this->authenticated($request, $user);
    }

    protected function authenticated()
    {
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You Have Been Logged Out!');
    }
}