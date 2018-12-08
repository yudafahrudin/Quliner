<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct() {
        $this->middleware('guest:admin')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.admins.login');
    }
    
     protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
