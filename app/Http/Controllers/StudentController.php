<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{	

	public function index()
    {
    	$student=Student::all();
    	return view('student.index',compact('student'));
    }

    public function create()
    {
    	return view('student.creat');
    }

    public function store(Request $req)
    {
    	  $validatedData = $req->validate([
            'name' => 'required|max:25|min:4',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students|max:12|min:9',
        ]);
    	 	 // $student=DB::table('students')->insert($student);
    	  $student = new Student;
    	  $student->name=$req->name;
    	  $student->email=$req->email;
    	  $student->phone=$req->phone;
    	  $student->save();
    	  if ('$student'){
    		$notification=array(
    			'messege'=>'Successfully Done',
    			'alert-type'=>'success'
    			);
    			return redirect()->back()->with($notification);
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

    public function show($id)
    {	
    		// DB::table('students')->where('id',$id)->first();
    	$student=Student::findorfail($id);
    	return view('student.view',compact('student'));
    }

    public function edit($id)
    {	
       		 // $edit=DB::table('students')->where('id',$id)->first();
    	$student=Student::findorfail($id);
    	return view('student.edit',compact('student'));

    }

    public function update(Request $req,$id)
    {	
        	// $student=DB::table('students')->where('id',$id)->update($student);
    	$student=Student::findorfail($id);
    	$student->name=$req->name;
    	$student->email=$req->email;
    	$student->phone=$req->phone;
    	$student->save();
    	if ($student){
    		$notification=array(
    			'messege'=>'Successfully Updated',
    			'alert-type'=>'success'
    			);
    			return redirect()->route('all.student')->with($notification);
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

    public function destroy($id)
    {	
    		// DB::table('students')->where('id',$id)->delete();
    	$student=Student::findorfail($id);
    	$student->delete();
    	$notification=array(
	    			'messege'=>'Successfully  Deleted !',
	    			'alert-type'=>'success'
	    			);
	    			return redirect()->back()->with($notification);
    }

}
