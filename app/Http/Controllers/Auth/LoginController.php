<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo;
    public function redirectTo()
    {
        if (auth()->user()->role_as == 1) {
            $this->redirectTo = '/admin/dashboard';
        } else if (auth()->user()->role_as == 0) {
            $this->redirectTo = '/user/dashboard';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $fieldData = $request->all();

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //if (auth()->attempt(array('username' => $fieldData['username'], 'password' => $fieldData['password']), isset($fieldData['remember'])))
        if (auth()->attempt(['email' => $fieldData['email'], 'password' => $fieldData['password']])) {
            // $userData = User::where('email', $fieldData['email'])->select('id', 'name', 'role')->first();
            // $request->session()->put('userData', $userData);
            if (auth()->user()->role_as == 1) {
                return redirect('admin/dashboard');
            } else {
                return redirect('user/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Your provided information wrong!');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
}
