<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('admin.auth.adminLogin');
    }

    /**
     * Handle an incoming authentication request.
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\RedirectResponse
 *  /

     * 
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $credentials = $request->only('email', 'password');
        // dd($credentials);
        $guard = 'admin'; // Specify the guard name

        if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}