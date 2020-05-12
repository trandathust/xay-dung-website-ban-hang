<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Components\ConvertToEnglish;
use Illuminate\Support\Str;
use App\Http\Requests\AdminRequest\RoleRequest;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
	
	private $role;
	private $permission;
	public function __construct(Role $role, Permission $permission){
		$this->role = $role;
		$this->permission = $permission;
	}
	public function getAddRole(){
		//lấy ra tên của vai trò
		$Role = $this->role->all();
        //lấy ra được quyền của các vai trò
		$Permission = DB::table('roles')
		-> join('permission_role','roles.id', '=' , 'permission_role.role_id')
		-> join('permissions','permission_role.permission_id' , '=' , 'permissions.id')
		-> select('role_id','permissions.display_name as permission_name')
		-> get()
		->unique();
		// $listPermission = $this->permission->all();
		$listPermissionParent = $this -> permission -> where('parent_id',0)->get();

		return view('admin.role.add',compact('Role','Permission','listPermissionParent',));
	}

	public function postAddRole(RoleRequest $request){
		try {

			DB::beginTransaction();
            //thêm dữ liệu vào bảng Addmin
			$roleCreate = $this->role->create([
				'name'=> str_slug($request -> display_name),
				'display_name' => $request -> display_name
			]);

			$roleCreate->permissions()->attach($request-> permission);

			DB::commit();
			return redirect()->route('admin.addrole');
		} catch (Exception $exception) {
			DB::rollBack();
			return redirect()->route('admin.addrole');
		}
	}


	public function getEditRole($id){
		$Role = $this->role->all();
        //lấy ra được quyền của các vai trò
		$Permission = DB::table('roles')
		-> join('permission_role','roles.id', '=' , 'permission_role.role_id')
		-> join('permissions','permission_role.permission_id' , '=' , 'permissions.id')
		-> select('role_id','permissions.display_name as permission_name')
		-> get()
		->unique();

		$listPermissionParent = $this -> permission -> where('parent_id',0)->get();
		$role = $this ->role -> findOrfail($id);
		$getAllPermissionOfRole = DB::table('permission_role')->where('role_id',$id)->pluck('permission_id');
		return view('admin.role.edit',compact('Role','Permission','listPermissionParent','role', 'getAllPermissionOfRole'));
	}
	public function postEditRole(RoleRequest $request, $id){
		try {
			DB::beginTransaction();
			//update to role table
			$this->role->where('id',$id)->update([
				'name'=> str_slug($request -> display_name),
				'display_name' => $request -> display_name
			]);
			//update to permission_role table
			DB::table('permission_role')->where('role_id',$id)->delete();
			$roleCreate = $this->role->find($id);
			$roleCreate -> permissions() ->attach($request->permission);
			DB::commit();
			return back()->with('thanhcong','Cập nhật thành công!');
		} catch (Exception $exception) {
			DB::rollBack();
			return back()->with('thongbao','Cập nhật thất bại! Không thay đổi quyền của người dùng');
		}
	}
	public function getDeleteRole($id){
		// try {
		// 	DB::beginTransaction();
		// 	//delete role
		// 	$role = $this->role->find($id);
		// 	$role->delete($id);
		// 	//delete role_id trong bảng permission_role
		// 	$role->permissions()->detach();
		// 	DB::commit();
		// 	return back();
		// } catch (Exception $exception) {
		// 	DB::rollBack();
		// 	return back();
		// }
		// return back();
		try {
            $this ->role -> find($id) -> delete();
            return response() -> json([
                'code' => 200,
                'message' => 'success'
            ], 200);
            
        } catch (Exception $exception) {
            return response() -> json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
            
        }

	}
}
