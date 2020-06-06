<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends FrontendController
{
	 public function __construct()
    {
        parent::__construct();
    }
    public function getListArticle()
    {
    	$articles = Article::where('a_active',Article::PUBLIC)->orderBy('id','DESC')->simplePaginate(5);
        $articleHot = Article::where('a_hot',Article::HOT)->get();
    	return view('article.index', compact('articles','articleHot'));
    }
    public function getDetailArticle(Request $request)
    {
        $arrayUrl = (preg_split("/(-)/i",$request->segment(2)));
        // tra ve mot mang cua url o segment thu 2
        //request->segment($segmentId): trả về segment có id chỉ định
        // /i Tìm kiếm không phân biệt hoa thường.
        $id = array_pop($arrayUrl);
        //Hàm array_pop() sẽ loại bỏ phần tử cuối cùng của mảng truyền vào. trả về phần tử bị loại bỏ.
        if ($id) {
            $articleDetail = Article::find($id);
            $articles = Article::orderBy('id','DESC')->paginate(4);
            $articleHot = Article::where('a_hot',Article::HOT)->get();
            $viewData = [
                'articles'      =>$articles,
                'articleDetail' => $articleDetail,
                'articleHot'    =>$articleHot
            ];
            return view('article.detail',$viewData);
    	 }
         return redirect('/');
    }     
}
