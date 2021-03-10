<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use DB;
class addcategorycontrotter extends Controller
{
    public function adcatgry()
    {
    	return view ('category.add_category');
    }

    public function storeCatgry( Request $req)
    {	
    	$validatedData = $req->validate([
            'name' => 'max:25|min:4',
            'slug' => 'required|max:25|min:4',
        ]);
        
    	$data=array();
    	$data['name']=$req->catname;
    	$data['slug']=$req->slug;

    	$category=DB::table('categories')->insert($data);
    	if ('$category'){
    		$notification=array(
    			'messege'=>'Successfully Category Inserted',
    			'alert-type'=>'info'
    			);
    			return redirect()->route('all.category')->with($notification);
    	}
    	else
    	{
    			$notification=array(
    			'messege'=>'Something went wrong',
    			'alert-type'=>'error'
    			);
    			return redirect()->back()->with($notification);
    	}
    	
    }
    public function allcatgry()
    {
        $category=DB::table('categories')->get();
         
         // echo "<pre>";
         //  print_r($category);
        return view('category.all_category',compact('category'));
    }
    public function viewCategory($id)
    {
        // echo "$name";
        $category=DB::table('categories')->where('name',$id)->first();
        // return view('category.view_category',compact('category'));
        return view('category.view_category')->with('category',$category);
    }
    public function deleteCategory($id)
    {
        $delete=DB::table('categories')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Successfully Category Deleted',
                'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);

    }
    public function editCategory($id)
    {    
        $edit=DB::table('categories')->where('id',$id)->first();
        return view('category.edit_category',compact('edit'));
       
    }
    public function updateCategory(Request $req,$id)
    {
        //  $validatedData = $req->validate([
        //     'name' => 'required|max:25|min:4',
        //     'slug' => 'required|max:25|min:4',
        // ]);
        
        $data=array();
        $data['name']=$req->catname;
        $data['slug']=$req->slug;

        $category=DB::table('categories')->where('id',$id)->update($data);
        if ($category){
            $notification=array(
                'messege'=>'Successfully Category updated',
                'alert-type'=>'success'
                );
                return redirect()->route('all.category')->with($notification);
        }
        else
        {
                $notification=array(
                'messege'=>'Nothing to update',
                'alert-type'=>'error'
                );
                return redirect()->route('all.category')->with($notification);
        }
    }

}
