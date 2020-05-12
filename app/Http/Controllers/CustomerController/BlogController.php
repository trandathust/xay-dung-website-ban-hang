<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Http\Requests\CustomerRequest\BlogCommentRequest;

class BlogController extends Controller
{
    private $blog;
    private $blogcomment;
    public function __construct(Blog $blog, BlogComment $blogcomment){
    	$this -> blog = $blog;
    	$this -> blogcomment = $blogcomment;
    }

    public function getBlog(){
    	$listBlog = $this -> blog -> where('status', '=', 1) -> simplePaginate(5);
    	return view('customer.pages.blog',compact('listBlog'));
    }

    public function getSingerBlog($id){
    	$dataBlog = $this -> blog ->findOrfail($id);
    	$listComment = $this -> blogcomment -> where('blog_id','=',$id)-> get();
    	return view('customer.pages.blog_singer',compact('dataBlog','listComment'));
    }



    public function BlogComment($id, BlogCommentRequest $request){
    	$this -> blogcomment -> create([
            'comment' => $request -> comment,
            'blog_id' => $request -> blog_id,
            'user_id' => $request -> user_id,
        ]);
        return response() -> json([
                'code' => 200,
                'message' => 'success'
            ], 200);
    }
}
