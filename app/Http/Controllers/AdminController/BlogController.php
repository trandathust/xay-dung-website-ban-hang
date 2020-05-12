<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest\BlogRequest;
use App\Models\Blog;
use Auth;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Str;

class BlogController extends Controller
{
	use StorageImageTrait;
	private $blog;
	public function __construct(Blog $blog){
		$this -> blog = $blog;
	}
	public function getAddBlog(){
		return view('admin.blog.add');
	}

	public function postAddBlog(BlogRequest $request){
		$status = $request -> status;
		if($status ==null)
			$status = 0;
		$dataBlogCreate =([
			'title' => $request -> title,
			'status' => $status,
			'content' => $request -> content,
			'user_id' => auth() -> id(),
			'slug' => str_slug($request -> title),
		]); 
		$dataUploadFeatureImage = $this -> storageTraitUpload($request,'image','blog');
		if (!empty($dataUploadFeatureImage)){
			$dataBlogCreate['title_image_name'] = $dataUploadFeatureImage['file_name'];
			$dataBlogCreate['title_image_path'] = $dataUploadFeatureImage['file_path'];
		}
		$this -> blog -> create($dataBlogCreate);
		return back()->with('thanhcong','Đã thêm bài viết!');
	}

	public function getViewBlog(){
		$listBlog = $this -> blog -> all();
		return view('admin.blog.view',compact('listBlog'));
	}

	public function editStatusBlog($id, Request $request){
		$this -> blog -> findOrfail($id)->update([
			'status' => $request -> status,
		]);
		return response() -> json([
			'code' => 200,
			'message' => 'success'
		], 200);
	}

	public function getEditBlog($id){
		$dataBlog = $this -> blog -> findOrfail($id);
		return view('admin.blog.edit',compact('dataBlog'));
	}
	public function postEditBlog($id, Request $request){
		$status = $request -> status;
		if($status ==null)
			$status = 0;
		$dataBlogUpdate =([
			'title' => $request -> title,
			'status' => $status,
			'content' => $request -> content,
			'user_id' => auth() -> id(),
			'slug' => str_slug($request -> title),
		]); 
		$dataUploadFeatureImage = $this -> storageTraitUpload($request,'image','blog');
		if (!empty($dataUploadFeatureImage)){
			$dataBlogUpdate['title_image_name'] = $dataUploadFeatureImage['file_name'];
			$dataBlogUpdate['title_image_path'] = $dataUploadFeatureImage['file_path'];
		}
		$this -> blog -> findOrfail($id)->update($dataBlogUpdate);
		return back()->with('thanhcong','Đã sửa bài viết!');
	}


	public function deleteBlog($id){
		$this -> blog -> findOrfail($id) -> delete();
		return response() -> json([
			'code' => 200,
			'message' => 'success'
		], 200);
	}
}
