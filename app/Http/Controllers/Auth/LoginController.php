<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        // Fetch the user manually by email
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        // Check if user exists and password matches
        if (!$user || !\Hash::check($credentials['password'], $user->password)) {
            return false; // Let Laravel return default "credentials do not match"
        }

        // Check status before allowing login
        if ($user->status !== 'Active') {
            session()->flash('error', 'Your account is blocked or inactive.');
            return false;
        }

        // Passed all checks — now login
        return Auth::login($user, $request->filled('remember'));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
