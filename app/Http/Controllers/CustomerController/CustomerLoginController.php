<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Requests\CustomerRequest\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Customer;

class CustomerLoginController extends Controller
{
    public function getCustomerLogin()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        };
        return view('customer.login');
    }
    public function postCustomerLogin(LoginRequest $request)
    {

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
            return redirect()->route('home');
        else {
            return back()->with('thatbai', 'Đăng nhập thất bại!');
        }
    }
    public function CustomerLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
