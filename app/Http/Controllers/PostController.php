<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\category;
use App\post;
use App\comment;
use App\postPicture;
use DB;
use Route;

class PostController extends Controller
{
    // Show bài post
    public function getShowPost($idPost=null)
    {
        // Hiển thị bài post mới nhất nếu ko truyền idPost
        if($idPost == null)
        {   // $postId = id post mới nhất
            $postId = post::orderBy('created_at', 'desc')->first()->id;
        }
        else    //Có truyền tham số $idPost
        {
            $postId = $idPost;
        }
        // $curentPost = post dựa theo đường dẫn
        $curentPost = post::find($postId);
        // $newRefPost các bài viết mới liên quan
        $newRefPost = post::where('id', '!=', $postId)->orderBy('created_at', 'desc')->take(5)->get();
        // Các hình ảnh cho bài viết trên bảng picture post
        $picturePost = postPicture::where('post_id', $postId)->get();
        // Đổ dữ liệu comment ra
        $comment = comment::where('post_id', $postId)->orderBy('created_at','desc')->paginate(5);
        $rating = comment::where('post_id', $postId)->select('rate')->get();
        return view('showpost.post', ['postId'=>$postId,'curentPost'=>$curentPost, 'newRefPost'=>$newRefPost, 'picturePost'=>$picturePost, 'comment'=>$comment, 'rating'=>$rating]);
    }
    // Thêm bài post
    public function getAddPost()
    {
    	// Kiểm tra có thể loại trước khi thêm
    	$category = category::all();
    	if(count($category) == 0)
    	{
    		return view('post.error_category');
    	}

    	return view('post.add_post', ['category'=>$category]);
    }

    // Xử lý post bài
    public function post_process_add_post(Request $request)
    {
    	// Validate
    	$this->validate($request, 
    		[
    			'n_category' => 'required',
    			'n_title' => 'required|min:5|max:100',
    			'n_des' => 'required',
                'images' => 'required',
    		],
    		[
                'n_category.required' => "Bạn chưa chọn thể loại.",
                'n_title.required' => "Bạn chưa nhập tiêu đề.",
                'n_title.min' => "Độ dài Tiêu đề tối thiểu phải 5 ký tự.",
                'n_title.max' => "Độ dài Tiêu đề tối đa là 100 ký tự.",
                'n_des.required' => "Bạn chưa nhập nội dung.",
                'images.required' => "Bạn chưa chọn hình liên quan.",
            ]
        );
    	// id user
    	$idUser = Auth::user()->id;
    	// id thể loại
    	$idCategory = $request->n_category;
    	$title = $request->n_title;
    	$website = $request->n_website;
    	$address = $request->n_address;
    	$phone = $request->n_phone;
    	$des = $request->n_des;
    	$openTime = $request->n_open_time;
    	$closeTime = $request->n_close_time;

    	$post = new Post();

    	// Xử lý upload hình ảnh lên
        // n_picture hình chính trên bảng post
        // n_ref_picture_1 các hình liên quan trên bảng post_picture
        // Thêm hình chính trên bảng post
    	if($request->hasFile('n_picture'))
    	{
    		$picture = $request->File('n_picture');
    		$namePicture = $picture->getClientOriginalName();
    		// random tên hình để ko trùng
    		$namePicture = str_random(4)."_".$namePicture;
    		while(file_exists("upload/picture/post".$namePicture))
    		{
    			$namePicture = str_random(4)."_".$namePicture;
    		}
    		// lưu hình upload
    		$picture->move('upload/picture/post', $namePicture);
    		$post->photo = $namePicture;
        }
        else
        {
          $post->photo = "";
      }
    	// Lưu database trên bảng post
      $post->category_id = $idCategory;
      $post->user_id = $idUser;
      $post->title = $title;
      $post->website = $website;
      $post->phone = $phone;
      $post->status = 0;
      $post->rate = 0;
      $post->address = $address;
        $post->status = 0;      //Chưa duyệt bài
        $post->rate = 0;
        $post->description = $des;
        $post->open_time = $openTime;
        $post->close_time = $closeTime;
        $post->save();

        // Thêm các hình liên quan 
        // Lấy id post vừa tạo
        $idNewestPost = post::orderBy('id', 'desc')->first()->id;

        // Thêm các hình liên quan 
        // Lấy id post vừa tạo
        $idNewestPost = post::orderBy('id', 'desc')->first()->id;
        if( $files = $request->file('images') ){
            foreach($files as $file){
                $postPicture = new postPicture;

                $name = $file->getClientOriginalName();
                // random tên hình để ko trùng
                $name = str_random(4)."_".$name;
                while(file_exists("upload/picture/post".$name))
                {
                    $name = str_random(4)."_".$name;
                }
                // upload hinh
                $file->move('upload/picture/post', $name);
                //  Lưu database
                $postPicture->post_id = $idNewestPost;
                $postPicture->reference_piture = $name;
                $postPicture->save();            
            }
        }

        return redirect('add_post')->with('notice_success', 'Bạn đã đăng bài thành công');
    }

    // Danh sách bài post
    public function getListPost()
    {
        $post = Post::all();
        return view ('post.list_post', ['post'=>$post]);
    }

    // Comment bai post
    public function getComment($idPost)
    {
        $post = post::find($idPost);
        $comment = comment::where('post_id', $idPost)->orderBy('created_at','desc')->get();
        return view('post.comment_post', ['post'=>$post, 'comment'=>$comment, 'idPost'=>$idPost]);
    }

    // Ajax comment
    public function getAjaxComment(Request $request)
    {
        // id post
        $idPost = $request->idPost;
        // Tiêu đề comment
        $titleComment = $request->titleComment;
        // Nội dung comment
        $contentComment = $request->comment;
        //nội dung rate
        $contentRate = $request->rate;
        // id nguời post bài
        $idUser = Auth::user()->id;
        // Thêm comment vào db
        $comment = new comment;
        $comment->user_id = $idUser;
        $comment->post_id = $idPost;
        $comment->title = $titleComment;
        $comment->content = $contentComment;
        $comment->rate = $contentRate;
        $comment->save();

        // Trả lại danh sách comment AJAX
        $urlPaginate = route('show_post'). "/". $idPost;
        $comment = comment::where('post_id', $idPost)->orderBy('created_at','desc')->paginate(5)->setPath($urlPaginate);
        //AVG
        $avgStar = comment::where('post_id', $idPost)->avg('rate');
        $postStar =  post::find($idPost);
        $postStar->rate = $avgStar;
        $postStar->save();
        //dd($avgStar);
        return view('post.ajax_comment', ['comment'=>$comment]);
    }

    // form Thêm thể loại
    public function getAddCategory()
    {
        return view('post.add_category');
    }
    // Xử lý thêm thể loại
    public function postProcessAddCategory(Request $request)
    {
        $this->validate($request,
            [
                'n_category' => 'required|min:3|max:50',
            ],
            [
                'n_category.required' => "Bạn chưa nhập tên thể loại.",
                'n_category.min' => "Độ dài tên thể loại tối thiểu phải 3 ký tự.",
                'n_category.max' => "Độ dài tên thể loại tối đa là 50 ký tự.",
            ]
        );
        $nameCategory = $request->n_category;
        $category = new category;
        $category->name = $nameCategory;
        $category->save();

        return redirect('add_category')->with('Success_Add_Cat', 'Thêm thể loại thành công');
    }
}
