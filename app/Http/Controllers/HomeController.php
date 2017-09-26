<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class HomeController extends Controller
{
    public function getPosition(Request $request)
    {
    	$keyword = $request->keyword;
    	$vitri = $request->vitri;
        // dd($vitri);
        $vitri1 = str_replace('(','',$vitri);
        $vitri2= str_replace(')','',$vitri1);
        $vitri3=str_replace(' ','',$vitri2);
        // dd($vitri3);
        $ogrigin =str_replace('/','-',$request->positionName);;
        // Hiển thị các bài viết mới
        // $post = post::orderBy('created_at', 'desc')->take(3)->get();
    	return view('index',['keyword'=>$keyword,'vitri'=>$vitri3,'ogrigin'=>$ogrigin]);
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
