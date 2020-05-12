<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Components\Recusive;
use Illuminate\Support\Str;
use App\Http\Requests\AdminRequest\MenuRequest;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    private $menus;

    public function __construct(Menu $menus){
      $this->menus = $menus;
  }
  public function getMenu($parentId){
    $data = $this-> menus ->all();
    $recusive=  new Recusive($data);
    $htmlOption = $recusive -> Recusive($parentId);
    return $htmlOption;
}
public function getAddMenu(){

    $htmlOption = $this ->getMenu($parentId ='');
    $menus = $this-> menus ->all();
    return view('admin.menus.add',compact('htmlOption','menus'));
}
public function postAddMenu(MenuRequest $request){
    try {
        $menus = $this->menus->create([
            'name' => $request -> name,
            'parent_id' => $request -> parent_id,
            'slug' => str_slug($request -> name),
            'url' => $request -> url,

        ]);
        return response() -> json([
            'id' => $menus -> id,
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
    //sửa menu
public function getEditMenu($id){
    $menu = $this -> menus -> find($id);
    $listmenus = $this-> menus ->all();

    $htmlOption = $this -> getMenu($menu -> parent_id);

    return view('admin.menus.edit',compact('menu','listmenus','htmlOption' ));

}
public function postEditMenu(MenuRequest $request, $id){
    try {
        $this -> menus -> find($id) -> update([
            'name' => $request -> name,
            'parent_id' => $request -> parent_id,
            'slug' => str_slug($request -> name),
            'url' => $request -> url,
        ]);
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
public function DeleteMenu($id){

    try {
        $this->menus->find($id)->delete();
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
