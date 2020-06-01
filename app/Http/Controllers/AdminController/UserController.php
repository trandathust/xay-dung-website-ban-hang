<?php

namespace App\Http\Controllers\AdminController;

use Auth;
use Hash;
use App\Models\User;
use App\Models\Role;
use Varidation;
use DB;
use App\Models\Permission;
use App\Http\Requests\AdminRequest\UserRequest;
use App\Traits\StorageImageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\CustomerRequest\PasswordRequest;

class UserController extends Controller
{
    use StorageImageTrait;


    private $user;
    private $role;
    private $permission;
    // người dùng và phân quyền.
    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

    //xem và thêm người dùng
    public function getAddUser()
    {
        $listUser = $this->user->get();
        $listRole = $this->role->all();
        $listUserRole = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->whereNull('roles.deleted_at')
            ->select('users.id', 'roles.display_name')
            ->get();
        return view('admin.user.add', compact('listUser', 'listRole', 'listUserRole'));
    }
    public function postAddUser(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            $userCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'birthday' => $request->birthday,
                'sex' => $request->sex,
            ];
            $userUploadAvatar = $this->storageTraitUpload($request, 'avatar_name', 'avatar');
            if (!empty($userUploadAvatar)) {
                $userCreate['avatar_name'] = $userUploadAvatar['file_name'];
                $userCreate['avatar_path'] = $userUploadAvatar['file_path'];
            }
            //thêm dữ liệu vào bảng Addmin
            $userCreate = $this->user->create($userCreate);
            if (!empty($request->roles)) {
                //thêm dữ liệu vào bảng Role
                $roleCreate = $request->roles;
                foreach ($roleCreate as $roleID) {
                    DB::table('role_user')->insert([
                        'user_id' => $userCreate->id,
                        'role_id' => $roleID
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.adduser');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.adduser');
        }
    }
    //sửa thông tin người dùng
    //show form sửa thông tin
    public function getEditUser($id)
    {
        $listUser = $this->user->get();
        $listRole = $this->role->all();
        $listUserRole = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->whereNull('roles.deleted_at')
            ->select('users.id', 'roles.display_name')
            ->get();
        //lấy thông tin của người dùng cần sửa.
        $user = $this->user->findOrfail($id);
        $getRoleOfUser = DB::table('role_user')->where('user_id', $id)->pluck('role_id');
        return view('admin.user.edit', compact('listUser', 'listRole', 'listUserRole', 'user', 'getRoleOfUser'));
    }

    //sửa thông tin
    public function postEditUser($id, Request $request)
    {
        $password = $this->user->findOrfail($id);
        try {
            DB::beginTransaction();
            //update to admin table
            if ($request->password == null) {
                $userUpdate = ([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $password->password,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'birthday' => $request->birthday,
                    'sex' => $request->sex,
                ]);
            } else {
                $userUpdate = ([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'birthday' => $request->birthday,
                    'sex' => $request->sex,
                ]);
            }
            $userUploadAvatar = $this->storageTraitUpload($request, 'avatar_name', 'avatar');
            if (!empty($userUploadAvatar)) {
                $userUpdate['avatar_name'] = $userUploadAvatar['file_name'];
                $userUpdate['avatar_path'] = $userUploadAvatar['file_path'];
            }
            $this->user->find($id)->update($userUpdate);
            //update to admin_role table
            DB::table('role_user')->where('user_id', $id)->delete();
            $roleCreate = $this->user->find($id);
            $roleCreate->roles()->attach($request->roles);

            DB::commit();
            return back()->with('thanhcong', 'Cập nhật thành công!');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('thongbao', 'Cập nhật thất bại! Không thay đổi thông tin của người dùng');
        }
    }

    public function detailUser($id)
    {
        $user = $this->user->findOrfail($id);
        $getRoleOfUser = DB::table('roles')
            ->where('user_id', $id)
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->whereNull('roles.deleted_at')
            ->pluck('display_name');
        $getPermissionOfUser = DB::table('role_user')
            ->where('user_id', $id)
            ->join('permission_role', 'role_user.role_id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->pluck('display_name')
            ->unique();
        return view('admin.user.detail', compact('user', 'getRoleOfUser', 'getPermissionOfUser'));
    }

    public function SoftDeleteUser($id)
    {
        try {
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    public function RestoreUser($id)
    {
        $user = $this->user->onlyTrashed()->find($id)->restore($id);

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
    public function DeleteUser($id)
    {
        try {
            $user = $this->user->onlyTrashed()->find($id);
            $user->forceDelete($id);
            //delete role user của bảng admin_role
            $user->roles()->detach();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    //xem danh sách user
    public function getListUser()
    {
        $listUserRole = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->whereNull('roles.deleted_at')
            ->select('users.id', 'roles.display_name')
            ->get();
        $userenable = DB::table('users')
            ->whereNull('users.deleted_at')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->whereNull('roles.deleted_at')
            ->select('users.*')
            ->get();
        $userdisable = DB::table('users')
            ->whereNotNull('users.deleted_at')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->whereNull('roles.deleted_at')
            ->select('users.*')
            ->get();
        return view('admin.user.list', compact('userenable', 'userdisable', 'listUserRole'));
    }
    //


    public function getProfile()
    {
        $id = auth()->user()->id;
        $user = $this->user->findOrfail($id);
        $getRoleOfUser = DB::table('roles')
            ->where('user_id', $id)
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->whereNull('roles.deleted_at')
            ->pluck('display_name');
        $getPermissionOfUser = DB::table('role_user')
            ->where('user_id', $id)
            ->join('permission_role', 'role_user.role_id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->pluck('display_name')
            ->unique();
        return view('admin.user.profile.profile', compact('user', 'getRoleOfUser', 'getPermissionOfUser'));
    }


    public function getEditProfile()
    {
        $id = auth()->user()->id;
        $user = $this->user->findOrfail($id);
        return view('admin.user.profile.edit', compact('user'));
    }

    public function postEditProfile(Request $request)
    {
        $password = auth()->user()->password;
        $id = auth()->user()->id;
        try {
            DB::beginTransaction();
            $userUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'birthday' => $request->birthday,
                'sex' => $request->sex,
            ];
            $userUploadAvatar = $this->storageTraitUpload($request, 'avatar_name', 'avatar');
            if (!empty($userUploadAvatar)) {
                $userUpdate['avatar_name'] = $userUploadAvatar['file_name'];
                $userUpdate['avatar_path'] = $userUploadAvatar['file_path'];
            }
            $this->user->findOrfail($id)->update($userUpdate);
            DB::commit();
            return back()->with('thanhcong', 'Cập nhật thành công!');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('thongbao', 'Cập nhật thất bại! Không thay đổi thông tin của người dùng');
        }
    }

    public function getChangePassword()
    {
        return view('admin.user.profile.change_password');
    }
    public function postChangePassword(PasswordRequest $request)
    {
        $current_password = auth()->user()->password;
        $id = auth()->user()->id;
        if (Hash::check($request->current_password, $current_password)) {
            $this->user->findOrfail($id)->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('thanhcong', 'Cập nhật mật khẩu thành công!');
        } else {
            return back()->with('thatbai', 'Bạn nhập sai mật khẩu!');
        }
    }
}
