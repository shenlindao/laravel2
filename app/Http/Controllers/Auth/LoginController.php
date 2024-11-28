<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials($request)
    {
        $credentials = $request->only($this->username(), 'password');

        return $credentials;
    }
}
