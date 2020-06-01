<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Requests\CustomerRequest\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\CustomerRequest\SinginRequest;
use App\Models\User;
use Hash;
use DB;

class CustomerLoginController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
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

        if (Auth::attempt(['email' => $request->email_login, 'password' => $request->password_login], $remember)) {


            //kiểm tra có phải admin hay không
            $listRole = DB::table('users')
                ->where('users.id', Auth::id())
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('roles.*')
                ->get()->pluck('id')->toArray();
            if (!$listRole) {
                return redirect()->route('home');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return back()->with('thatbai', 'Sai email hoặc mật khẩu!');
        }
    }
    public function postCustomerSingin(SinginRequest $request)
    {
        $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect()->route('home');
        else {
            return back()->with('thatbai', 'Đăng ký thất bại!');
        }
    }
    public function CustomerLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
