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
        $postNhahang = category::find(7)->post()->where('status', 1)->orderBy('rate', 'desc')->paginate(1, ['*'], 'pagination_a');
        // Post khách sạn
        $postKhachSan = category::find(8)->post()->where('status', 1)->orderBy('rate', 'desc')->paginate(1, ['*'], 'pagination_b');  
        // Khác
        $postAll = post::where('category_id', '!=', 7)->where('category_id', '!=', 8)->where('status', 1)->orderBy('rate', 'desc')->paginate(1, ['*'], 'pagination_khac');
        return view('index', ['postNhahang' => $postNhahang, 'postKhachSan' => $postKhachSan, 'postAll'=>$postAll ]);
    }

    // Ajax pagination Page AAAAAAA (nhà hàng)
    public function ajaxPaginationA($pagination_a = '1')
    {
         $postNhahang = category::find(7)->post()->where('status', 1)->orderBy('rate', 'desc')->paginate(1, ['*'], 'pagination_a');
        return view('view_ajax_index_pageA', ['postNhahang'=>$postNhahang]);
    }
     // Ajax pagination Page BBBBBB (khách sạn)
    public function ajaxPaginationB($pagination_b = '1')
    {
        $postKhachSan = category::find(8)->post()->where('status', 1)->orderBy('rate', 'desc')->paginate(1, ['*'], 'pagination_b');
        return view('view_ajax_index_pageB', ['postKhachSan'=>$postKhachSan]);
    }
    // Ajax pagination Page khac (còn lại)
    public function ajaxPaginationKhac()
    {
        $postAll = post::where('category_id', '!=', 7)->where('category_id', '!=', 8)->where('status', 1)->orderBy('rate', 'desc')->paginate(1, ['*'], 'pagination_khac');
        return view('view_ajax_index_khac', ['postAll'=>$postAll]);
    }
    public function getFind(Request $request)
    {
        // dd($request->something);
        $keyword = $request->keyword;
        $vitri = $request->vitri;
        $radius = $request->radius_name;
        $checkType = $request->checkType;
        if($radius == null)
        {
            $radius = 5;    //5km
        }
        $radius = $radius * 1000; // met
        $vitri1 = str_replace('(','',$vitri);
        $vitri2= str_replace(')','',$vitri1);
        $vitri3=str_replace(' ','',$vitri2);
        // dd($vitri3);
        // $vitri3="10.867114,106.803272";
        $ogrigin =str_replace('/','-',$request->positionName);
        // Hiển thị các bài viết mới
        // $post = post::orderBy('created_at', 'desc')->take(3)->get();
        
        return view('find',['keyword'=>$keyword,'vitri'=>$vitri3,'ogrigin'=>$ogrigin, 'radius'=>$radius, 'checkType'=>$checkType]);
    }

    public function direct($position="",$endposition="",$ogrigin="",$destination="", $travelMode = 'DRIVING')
    {
        // dd($travelMode);
        return view('direct',['position'=>$position,'endposition'=>$endposition,'ogrigin'=>$ogrigin,'destination'=>$destination, 'travelMode'=>$travelMode]);
    }

    public function directMove($position="")
    {
        return view('directmove',['position'=>$position]);
    }

    // Chỉ đường bên post
    public function getDirectPost(Request $request)
    {
        $ogrigin = $request->direct_post_name;      //Tên vị trí xuất phát
        $destination = $request->destination_name;  // Tên vị trí đến
        $position =  $request->direct_post_name;    //Vị trí xuất phát
        $endposition = $request->endposition_name;
        $travelMode = 'DRIVING';
        return view('direct',['position'=>$position,'endposition'=>$endposition,'ogrigin'=>$ogrigin,'destination'=>$destination, 'travelMode'=>$travelMode]);
    }
}
