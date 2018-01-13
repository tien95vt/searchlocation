<?php
Route::get('/', function () {
    return view('welcome');
});
// trang chủ
Route::get('index',"HomeController@getPosition")->name('getPosition');
// Trang tìm kiếm
Route::get('find', "HomeController@getFind")->name('getFind');
Route::get('direct/{position}/{endposition}/{ogrigin}/{destination}/{travel_mode?}',"HomeController@direct")->name('direct');
// Chỉ đường bên post
Route::get('direct_post', "HomeController@getDirectPost")->name('direct_post');
Route::get('move/{position}',"HomeController@directMove")->name('move');
// ajax pagination_a idex  AAAAAA (Nhà hàng)
Route::get('ajax/product_pageA/{page?}', "HomeController@ajaxPaginationA");
// ajax pagination_a idex  BBBB (khách sạn)
Route::get('ajax/product_pageB/{page?}', "HomeController@ajaxPaginationB");
// ajax pagination_a idex  Khac  (còn lại)
Route::get('ajax/product_pageKhac/{page?}', "HomeController@ajaxPaginationKhac");
// ajax pagination_a idex  cafe
Route::get('ajax/product_pageCafe/{page?}', "HomeController@ajaxPaginationCafe");


// --------------- Begin trang quản trị ---------------------------------
Route::get('admin', 'AdministratorController@getAdmin')->middleware('test_admin');
// Quản lý danh sách account
Route::get('admin/list_user', 'AdministratorController@getAdminListUser')->middleware('test_admin');
// Xử lý thay đổi quyền user
Route::get('change_role', 'AdministratorController@getChangeRole')->name('change_role');
// Quản lý bài post
Route::get('admin/list_post', 'AdministratorController@getListPost')->middleware('test_admin');
// Xử lý duyệt bài post
Route::get('admin/change_post_status/{post_id?}', 'AdministratorController@getChangePostStatus')->middleware('test_admin');
// Danh sách bài post của mình
Route::get('list_my_post', 'PostController@getListMyPost')->name('list_my_post');
// Sửa bài post của mình
Route::get('edit_my_post/{post_id}', 'PostController@getEditMyPost')->name('edit_my_post');
// Xử lý sửa bài post của mình
Route::post('process_edit_my_post/{post_id}', 'PostController@postEditMyPost')->name('post_edit_my_post');
// Xóa bài post của mình
Route::get('delete_my_post/{post_id}', 'PostController@getDeleteMyPost');

// --------------- End trang quản trị ---------------------------------

// ------------- Login- Register------------------------------
Route::get('test', 'AuthenController@getTest');

// Form đăng ký
Route::get('register_form', 'AuthenController@getRegisterForm');
// Xử lý đăng ký
Route::post('process_register', 'AuthenController@postProcessRegister');
// Form đăng nhập
Route::get('login_form', 'AuthenController@getLoginForm');
// Xử lý đăng nhập
Route::post('process_login', 'AuthenController@postProcessLogin');
// Đăng xuất
Route::get('logout', 'AuthenController@getLogout');
// Thông tin account user
//Profile
Route::get('profile/{userId?}', 'AuthenController@getInfoUser')->middleware('user_login');
// Route::get('info_user/{userId?}', 'AuthenController@getInfoUser')->middleware('user_login');
// Xử lý thay đổi profile (-avatar)
Route::get('ajax_profile', 'AuthenController@getAjaxProfile')->name('ajax_profile');
// thay đổi avatar
Route::post('ajax_change_avatar', 'AuthenController@postAjaxChangeAvatar')->name('ajax_change_avatar');
// -----------------End Login- Register-------------------------
// -------------------Begin Post bài----------------------------
// Thêm bài post
Route::get('add_post', 'PostController@getAddPost')->middleware('user_login');
// ----------------------------End Post bài----------------------------
//Show bài post
Route::get('showpost/{idPost?}', 'PostController@getShowPost')->name('show_post');
// Xử lý thêm post bài
Route::post('process_add_post', 'PostController@post_process_add_post');
// Danh sách bài post
Route::get('list_post', 'PostController@getListPost');
// Thêm thể loại category
Route::get('add_category', 'PostController@getAddCategory')->name('add_category')->middleware('user_login');;
// Xử lý thêm thể loại
Route::post('proccess_add_category', 'PostController@postProcessAddCategory')->name('proccess_add_category');
// ----------------End Post bài----------------------------
// ----------------Begin comment post--------------------
// thông tin bài post và comment
Route::get('comment/{idPost}', 'PostController@getComment');
// ajax comment
Route::get('ajax_comment', 'PostController@getAjaxComment')->name('ajax_comment');
// ---------------End comment post-----------------------------

// test
Route::get('aj_asdasdas', function(){	
	return view('post.test');
});

// ----------------------------End Post bài----------------------------

