<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\post;
use Illuminate\Support\Facades\Auth;
class AdministratorController extends Controller
{
    // Trang quản trị 
    public function getAdmin(){
    	return view('admin.list_admin');
    }

    // Quản lý danh sách user account
    public function getAdminListUser()
    {
        // role: 0 = user, 1=admin
        $user = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.list_user', ['user'=>$user]);
    }
    // xử lý thay đổi quyền user
    public function getChangeRole(Request $request)
    {
        $idUser = $request->idUser;
        $new_role = $request->new_role;
        $user = User::find($idUser);
        $user->role = $new_role;
        $user->save();
        // return redirect('admin/list_user');
    }
    // Quản lý bài post
    public function getListPost(){
    	$post = Post::orderBy('status', 'DESC')->get();
    	return view('admin.list_post', ['post'=>$post]);
    }
    // Xử lý duyệt bài post
    public function getChangePostStatus($post_id = 1)
    {
    	$post = post::find($post_id);
    	// thay đổi trạng thái
    	if($post->status == 1)
		{
			$post->status = 0;
		}else{
			$post->status = 1;
		}
		$post->save();
		return redirect('admin/list_post')->with('change_status_successfully', 'Bạn đã thay đổi thành công');
    }
}
