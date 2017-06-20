<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    }

    public function getLogin(){
      if (Auth::check()) {
          return redirect()->route('dashboard');
      }
      return view('login');
    }

    public function postLogin(Request $request)
    {
      $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required'
      ]);
      // dd(bcrypt($request['password']));

      if (!Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
        return redirect()->back()->withErrors('Please try again.');
      }
      return redirect()->intended('dashboard');
    }

    public function getLogout()
    {
      Auth::logout();
      return redirect()->route('login');
    }
}
