<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function getPosition(Request $request)
    {
        // Post Nhà hàng
        $postNhahang = category::find(7)->post()->paginate(4, ['*'], 'pagination_a');
        // Post khách sạn
        $postKhachSan = category::find(8)->post()->paginate(1, ['*'], 'pagination_b');
        // $postKhachSan->setPageName('other_page');
        
        // Hiển thị các bài viết mới
        // $post = post::orderBy('created_at', 'desc')->take(5)->get();
    	// return view('index',['keyword'=>$keyword,'vitri'=>$vitri3,'ogrigin'=>$ogrigin]);
        return view('index', ['postNhahang' => $postNhahang, 'postKhachSan' => $postKhachSan ]);
    }

    public function getFind(Request $request)
    {
        $keyword = $request->keyword;
        $vitri = $request->vitri;
        $radius = $request->radius_name;
        if($radius == null)
        {
            $radius = 5;    //5km
        }
        $radius = $radius * 1000; // met
        $vitri1 = str_replace('(','',$vitri);
        $vitri2= str_replace(')','',$vitri1);
        $vitri3=str_replace(' ','',$vitri2);
        // dd($vitri3);
        $ogrigin =str_replace('/','-',$request->positionName);
        // Hiển thị các bài viết mới
        // $post = post::orderBy('created_at', 'desc')->take(3)->get();
        return view('find',['keyword'=>$keyword,'vitri'=>$vitri3,'ogrigin'=>$ogrigin, 'radius'=>$radius]);
    }

    public function direct($position="",$endposition="",$ogrigin="",$destination="")
    {
        return view('direct',['position'=>$position,'endposition'=>$endposition,'ogrigin'=>$ogrigin,'destination'=>$destination]);
    }

    public function directMove($position="")
    {
        return view('directmove',['position'=>$position]);
    }
}
