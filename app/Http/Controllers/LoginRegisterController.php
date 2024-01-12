<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginRegisterController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout'
        ]);
    }

  

    public function signup()
    {
        return view('user.auth.signup');
    } 

    
    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
   
     */
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:5'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('home')
        ->withSuccess('You have successfully registered & logged in!');
    }

     /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            
            $user = Auth::user();
            if ($user->user_type == 1) {
                return redirect()->route('home')
                    ->withSuccess('You have successfully logged in as user!');
            } else {
                return redirect()->route('admin.dashboard')
                    ->withSuccess('You have successfully logged in!');
            }
          
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 
   
     /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')
            ->withSuccess('You have logged out successfully!');;
    }    
    


   
 
}
