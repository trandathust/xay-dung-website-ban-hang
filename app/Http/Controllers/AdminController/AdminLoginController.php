<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\AdminRequest\LoginRequest;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        };
        return view('admin.admin_login');
    }
    public function postLogin(LoginRequest $request)
    {

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
            return redirect()->route('admin.dashboard');
        else {
            return back()->with('thatbai', 'Đăng nhập thất bại!');
        }
    }
    //logout
    public function Logout()
    {
        Auth::Logout();
        return redirect()->route('admin.getLogin');
    }
}
