<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('pages.index');
// });

Route::get('/','HelloController@index');


Route::get('/about','HelloController@about')->name('about');
Route::get('/contactus','Hellocontroller@contact')->name('contact');


// category crud are here.......

Route::get('add/category','addcategorycontrotter@adcatgry')->name('add.category');
Route::get('all/category','addcategorycontrotter@allcatgry')->name('all.category');
Route::get('store/category','addcategorycontrotter@storeCatgry')->name('store.category');
Route::get('View/category/{id}','addcategorycontrotter@viewCategory');
Route::get('Delete/category/{id}','addcategorycontrotter@deleteCategory');
Route::get('Edit/category/{id}','addcategorycontrotter@editCategory');
Route::post('update/category/{id}','addcategorycontrotter@updateCategory');

// post crud are here............
Route::get('/write/post','postcontroller@insert')->name('write.post');
Route::get('store/post','postController@storePost')->name('store.post');
Route::get('/all/post','postcontroller@allPost')->name('all.post');
Route::get('View/post/{id}','postcontroller@viewPost');
Route::get('Delete/post/{id}','postcontroller@deletePost');
Route::get('Edit/post/{id}','postcontroller@editPost');
Route::post('update/post/{id}','postcontroller@updatePost');

// student.....
Route::get('student','StudentController@create')->name('student');

Route::get('store/student','StudentController@store')->name('store.student');
Route::get('all/student','StudentController@index')->name('all.student');
Route::get('View/student/{id}','StudentController@show');
Route::get('Delete/student/{id}','StudentController@destroy');
Route::get('Edit/student/{id}','StudentController@edit');
Route::post('update/student/{id}','StudentController@update');
















// Route::get('/student','StudentController@addstudent');
// Route::get('/hello','HelloController@manush');
// Route::get('/guru','HelloController@guru');
// Route::get(md5('/salarypage'),'SalaryController@emplyee')->name('salary');




// Route::get('/blog', function() {
// 		return view('blog',['osman' => 'to Blog page']);
// });


// Route::get('/about', function() {
// 		return view('about');
// });


// Route::get('/aboutpage', function() {
// 		return view('about');
// })->middleware('agevarify');


// Route::get('/home', function () {
// 	echo "eta home page";
// });


// Route::get('/contact', function() {
// 		return view('pages.contact');
// })->middleware('agevarify');











// Route::group(['middleware' => ['agevarify']], function () {
       
	// 		Route::get('/aboutpage', function() {
	// 				return view('about');
	// 		})->middleware('agevarify');


	// 		Route::get('/home', function () {
	// 			echo "eta home page";
	// 		});


	// 		Route::get('/contact', function() {
	// 				return view('pages.contact');
	// 		})->middleware('agevarify');

// });