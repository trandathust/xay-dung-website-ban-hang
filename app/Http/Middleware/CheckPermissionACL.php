<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Models\Permission;
use Auth;

class CheckPermissionACL
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        $footer = DB::table('settings')->where('config_key', 'footer')->value('config_value');
        view()->share('footer', $footer);
        //lấy tất cả vai trò của người dùng khi truy cập vào hệ thống.
        $listRole = DB::table('users')
            ->where('users.id', Auth::id())
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('roles.*')
            ->get()->pluck('id')->toArray();
        //lấy tất cả quyền của vai trò
        $listPermission = DB::table('roles')
            ->whereIn('roles.id', $listRole)
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->select('permissions.*')
            ->pluck('permissions.id')
            ->unique();

        $listPermissionOfParent_ = DB::table('roles')
            ->whereIn('roles.id', $listRole)
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->select('permissions.*')
            ->pluck('permissions.parent_id')
            ->unique();
        $listPermissionOfParent = DB::table('permissions')
            ->whereIn('id', $listPermissionOfParent_)
            ->select('name')
            ->get()->pluck('name')->toArray();
        view()->share('listPermissionOfParent', $listPermissionOfParent);
        //lấy ra url tương ứng được truy cập vào
        $checkURL = Permission::where('name', $permission)->value('id');
        //kiểm tra user có đươc phép truy cập url đó không
        if ($listPermission->contains($checkURL) || $permission == 'dashboard') {
            return $next($request);
        }
        return abort(401);
    }
}
