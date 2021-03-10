<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class postController extends Controller
{
    public function insert()
    {   
        $category=DB::table('categories')->get();
    	return view ('post.writepost',compact('category'));
    }
    public function storePost(Request $req)
    {
    		$validatedData = $req->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
           ]);

    	$data=array();
    	$data['title']=$req->title;
    	$data['category_id']=$req->category_id;
    	$data['details']=$req->details;
    	$image=$req->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/frontend/image/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		$data['image']=$image_url;
    		DB::table('posts')->insert($data);
    		$notification=array(
    			'messege'=>'Successfully Post Inserted',
    			'alert-type'=>'success'
    			);
    			return redirect()->back()->with($notification);
    	}
    	else {
    			DB::table('posts')->insert($data);
    			$notification=array(
    			'messege'=>'Successfully cul Inserted',
    			'alert-type'=>'success'
    			);
    			return redirect()->back()->with($notification);
    	}
    }
    public function allPost()
    {
	    	// $post=DB::table('posts')->get();
	    	$post=DB::table('posts')
	    	      ->join('categories','posts.category_id','categories.id')
	    	      ->select('posts.*','categories.name')
	    	      ->get();
	    	return view ('post.all_post',compact('post'));
	    	      // echo "<pre>";
	    	      // print_r($post);
    }
    public function viewPost($id)
    {
	    	$post=DB::table('posts')
	    		  ->join('categories','posts.category_id','categories.id')
	    	      ->select('posts.*','categories.name')
	    	      ->where('posts.id',$id)
	    	      ->first();

	    	return view ('post.view_post',compact('post'));
    }
    public function deletePost($id)
    {
	    	$post=DB::table('posts')->where('id',$id)->first();
	    	$image=$post->image;
	    	$delete=DB::table('posts')->where('id',$id)->delete();
	    	if ($delete) {
	    		unlink($image);
	    		$notification=array(
	    			'messege'=>'Successfully Post Deleted !',
	    			'alert-type'=>'success'
	    			);
	    			return redirect()->back()->with($notification);
	    	}
	    	else {
	    		$notification=array(
	    			'messege'=>'Something went wrong !',
	    			'alert-type'=>'error'
	    			);
	    			return redirect()->back()->with($notification);

	    	}
    }
    public function editPost($id)
    {
	    	$category=DB::table('categories')->get();
	    	$post=DB::table('posts')->where('id',$id)->first();

	    	return view ('post.edit_post',compact('category','post'));
	    	 
    }
    public function updatePost(Request $req,$id)
    {
    		$validatedData = $req->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
           ]);

    	$data=array();
    	$data['title']=$req->title;
    	$data['category_id']=$req->category_id;
    	$data['details']=$req->details;
    	$image=$req->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/frontend/image/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		$data['image']=$image_url;
    		// unlink($req->old_photo);
    		DB::table('posts')->where('id',$id)->update($data);
    		$notification=array(
    			'messege'=>'Successfully Post updated',
    			'alert-type'=>'success'
    			);
    			return redirect()->route('all.post')->with($notification);
    	}
    	else {	
    			$data['image']=$req->old_photo;
    			DB::table('posts')->where('id',$id)->update($data);
    			$notification=array(
    			'messege'=>'Successfully cul updated',
    			'alert-type'=>'success'
    			);
    			return redirect()->route('all.post')->with($notification);
    	}

    }
    
   
  
}
