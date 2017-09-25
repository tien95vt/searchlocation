<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\profile;
use App\post;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthenController extends Controller
{
	 // Test
    public function getTest(Request $request)
    {
        dd($request->n_des);
        return view('test');
    }
	// Form đăng ký
    public function getRegisterForm()
    {
    	return view('login.register');
    }

    // Xử lý đăng ký
    public function postProcessRegister(Request $request)
    {
        // Validate
        $this->validate($request,
            [
                'name' => 'required|min:3|max:50',

                'email' => 'required|unique:users,email',

                'password' => 'required|min:6|max:50',

                'confirm_password' => 'required|same:password'
            ],
            [
                'name.required' => 'Bạn chưa nhập họ và tên',
                'name.min' => 'Họ và Tên phải ít nhất là 3 ký tự',
                'name.max' => 'Họ và Tên phải không vượt quá 50 ký tự',

                'email.required' => 'Bạn chưa nhập địa chỉ Email',
                'email.unique' => 'Địa chỉ Email này đã tồn tại',

                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Độ dài mật khẩu phải trên 6 ký tự',

                'confirm_password.required' => 'Bạn chưa nhập lại mật khẩu',
                'confirm_password.same' => 'Nhập lại mật khẩu không chính xac.'

            ]);
        // Xử lý
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->save();
        // Tạo profile tương ứng
        $profile = new Profile;
        // lấy user vừa mới tạo
        $user_id_last = DB::table('users')->orderBy('id', 'desc')->first()->id;
        $profile->user_id = $user_id_last;
        $profile->user_id = $user_id_last;
        $profile->avatar = "default.jpg";
        $profile->save();

        return redirect('register_form')->with('register_notice', 'Chúc mừng! Bạn đã đăng ký thành công');
    }

    // Form đăng nhập
    public function getLoginForm()
    {
    	return view('login.login');
    }

    // Xử lý đăng nhập
    public function postProcessLogin(Request $request)
    {
        $this->validate($request, 
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Bạn chưa nhập địa chỉ email',
                'password.required' => 'Bạn chưa nhập mật khẩu',
            ]
        );
        $email = $request->email;
        $password = $request->password;
        if( Auth::attempt(['email'=>$email, 'password'=>$password]) )
        {
            return redirect('index');
        }
        else
        {
           return redirect('login_form')->with('error_login', 'Địa chỉ email hoặc mật khẩu không đúng!'); 
        }
    }

    // Đăng xuất
    public function getLogout()
    {
        Auth::logout();
        return redirect('login_form');
    }

    // Quản lý danh sách user account
    public function getListUser()
    {
        // role: 0 = user, 1=admin
        $user = User::all();
        return view('user.list_user', ['user'=>$user]);
    }

    // xử lý thay đổi quyền user
    public function getChangeRole($a)
    {
        dd($a);
    }

    // Quản lý thông tin user
    public function getInfoUser($userId)
    {
        // Thông tin user
        $user = User::find($userId);
        if(Auth::user()->id == $userId)
        {
            // Các bài post 
            $post = post::orderBy('created_at', 'desc')->take(5)->get();
            return view('profile.profile', ['user'=>$user, 'post'=>$post]);
        }
        return redirect('login_form');
    }
    // Xử lý thay đổi profile
    public function getAjaxProfile(Request $request)
    {
        $idUser = Auth::user()->id;
        $attribute = $request->atribute_click;
        $info_change = $request->info_change;
        // thay đổi name hoặc email -> bên bảng users
        if($attribute=="name" || $attribute=="email")
        {
            $user = User::find($idUser);
            $user->$attribute = $info_change;
            $user->save();
        }
        else  //Thay đổi bên bảng profile
        {
            $idProfile = User::find($idUser)->profile->id;
            $profile = Profile::find($idProfile);
            if($attribute == 'date_of_birth')
            {
                // Format lại date
                $info_change = strtotime($info_change);
                $info_change = date('Y-m-d',$info_change);
            }
            $profile->$attribute = $info_change;
            $profile->save();
        }
    }

    // Thay đổi avatar
    public function postAjaxChangeAvatar(Request $request)
    {
        $avatar = $request->File('n_avatar');
        $namePicture = $avatar->getClientOriginalName('n_avatar');
        // random tên hình để ko trùng
        $namePicture = str_random(4)."_".$namePicture;
        while(file_exists("upload/picture/profile".$namePicture))
        {
            $namePicture = str_random(4)."_".$namePicture;
        }
        // lưu hình upload
        $avatar->move('upload/picture/profile', $namePicture);
        $idUser = Auth::user()->id;
        $idProfile = User::find($idUser)->Profile->id;
        $profile = Profile::find($idProfile);
        $profile->avatar = $namePicture;
        $profile->save();
    }
}
