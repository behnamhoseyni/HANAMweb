<?php

namespace App\Http\Controllers\Admin;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\user;
use App\Http\Controllers\Controller;

class ArticleController extends AdminController
{
    public function index()
    {
        // auth()->loginUsingId();
        {
            $articles =Article::latest()->paginate(20);
            return view('Admin.Articles.all',compact('articles'));
        }
    }


    public function create()
    {
        return view('Admin.Articles.create');
    }


    public function store(ArticleRequest $request)
    {

        $imageUrl=$this->uploadImages($request->file('images'));
        Artile::create(array_merge($request->all(),['image' => $imageUrl]));

        return redirect(route('articles.index'));
    }


    public function show($id)
    {
        //
    }
    public function edit(Article $article )
    {
        return view('Admin.Articles.edit',compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
      $file=$request->file('images');
      $inpute=$request->all();

      if ($file) {
          $inpute['images']= $imageUrl = $this->uploadImages($request->file('images'));
      }
      else {
          $inpute['images']=$article->images;
      }
        $inpute['images']['thumb']=$inpute['imageThumb'];
        unset($inpute['imageThumb']);
        $article->update($inpute);

        return redirect(route('articles.index'));


    }


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }
}
