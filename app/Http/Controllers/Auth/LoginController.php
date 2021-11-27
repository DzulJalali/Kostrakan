<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
        $this->user = new User();
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request,
        [
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('username'=>$input['username'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 1)
            {
                return redirect()->route('admin.home');
            }
            else
            {
                return redirect()->route('home');
            }
        }
        else
        {
            return redirect()->route('login')->with('error', 'Username dan Password Salah.');
        }
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        // $user = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', '=', $data->email)->first();
        
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->password = Hash::make(Str::random(24));
            $user->save();
        }
        // dd($user);
        // $user = User::firstOrCreate([
        //     'email' => $user->email
        // ],
        // [
        //     'name' => $user->name,
        //     'username' => $user->name,
        //     'password' => Hash::make(Str::random(24)),
        //     'profile_image' => $user->avatar

        // ]);

        Auth::login($user);

        // return redirect('home');
    }
}
