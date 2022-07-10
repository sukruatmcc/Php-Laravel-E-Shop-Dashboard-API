<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginFront()
    {
      return view('front.include.login_front');
    }

    public function registerFront()
    {
      return view('front.include.register_front');
    }
}
