<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use App\Models\Role;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        //lấy tất cả vai trò của người dùng khi truy cập vào hệ thống.
        $listRoleOfUser = DB::table('users')
        ->where('users.id',Auth::id())
        ->join ('role_user', 'role_user.user_id', '=', 'users.id')
        ->join ('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('roles.*')
        ->whereNull('roles.deleted_at')
        ->get() ->pluck('id')->toArray();
        //kiểm tra user có đươc phép truy cập url đó không
        if($listRoleOfUser){
            return $next($request);
        }
        return redirect() -> route('home');

    }
}
