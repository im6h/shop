<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestArticle;
use App\Models\Article;
class AdminArticleController extends Controller
{
    public function index(Request $request)//tuong duong show list
    {
        // $articles = Article::whereraw(1);
        //lay du lieu khong can dung get()
        //select*from 'articles' where 1 voi 1 la dieu kien luon luon dung 
        // if($request->name) $articles->where('a_name','like','%'.$request->name.'%');
        //$request->name la request cua nguoi dung nhap vao o tim kiem

        $articles = Article::paginate(5);
        // $articles = $articles->paginate(5);
        //paginate phan trang
        $viewData = [
            'articles' => $articles // 'articles' la bien tra ve view
        ];
        return view('admin::article.index',$viewData);//tra du lieu ve view
    }
    public function create()//them mot article moi, show ra trang them article
    {
        return view('admin::article.create');
    }
    public function store(RequestArticle $requestArticle)//luu mot article, phuong thuc post
    {
        $this->insertOrUpdate($requestArticle);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)//show ra trang update article
    {
        $article = Article::find($id);
        return view('admin::article.create',compact('article'));//compact() trong Laravel dùng khi muốn truyền thêm cua article vào view. cu the o form.blade.php
    }
    public function update(RequestArticle $requestArticle, $id)//luu article da cap nhat, phuong thuc post
    {
        $this->insertOrUpdate($requestArticle,$id);
        return redirect()->back()->with('info','Cập nhật thành công');
    }
    public function insertOrUpdate($requestArticle , $id='')
    {
        $article = new Article();//Khai bao mot article moi
        if($id) $article = Article::find($id);//kiem tra su ton tai cua id
        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_description = $requestArticle->a_description;
        $article->a_content = $requestArticle->a_content;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description ;
        if ($requestArticle->hasFile('avatar')) 
      {
        $file = upload_image('avatar');
        if(isset($file['name']))
        {
          $article->a_avatar = $file['name'];
        }
      }
        $article->save();
    }

    public function action($action,$id){
      $article = Article::find($id);
      if($action){
        switch ($action)
        {
            case 'delete':
                $article->delete();
                $messages = 'Xóa thành công!';
                break;

            case 'active':
                $article->a_active = $article->a_active ? 0 : 1;//kho hieu, khi 1 tra ve 0 , khi 0 tra ve 1
                $messages = 'Cập nhật thành công';
                $article->save();
                break;
            case 'hot':
                $article->a_hot = $article->a_hot ? 0 : 1;
                $messages = 'Cập nhật thành công';
                $article->save();
                break;
        }
      }
      return redirect()->back()->with('success',$messages);
    }
}
