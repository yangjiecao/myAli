<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticleController extends Controller
{
    protected $pageSize = 10; 

    public function getShow ($id=1) {
        $article = Article::find($id);
        $techs = Article::where('tag','技术博文')->orderBy('id','DESC')->take(5)->select('id','subject')->get();
        $news = Article::orderBy('id','DESC')->take(5)->select('id','subject')->get();
        $rands = Article::orderByRaw('RAND()')->take(5)->select('id','subject')->get();
        return view('front.view',['article'=>$article,'techs'=>$techs,'news'=>$news,'rands'=>$rands]);
    }

    public function getLists($currentPage=1)
    {
        $lists = Article::getList($currentPage, $this->pageSize);
        foreach ($lists as $list) {
        	$list->content = str_limit(strip_tags($list->content),10);
        }
        return $lists;
    }

    public function addArticle (Request $request) {
    	$input = $request->input();
    	$article = new Article;
    	$article->tag = $input['tag'];
    	$article->subject = $input['subject'];
    	$article->content = $input['content'];
    	$article->save();
        $article->content = str_limit(strip_tags($article->content),10);
    	return $article;
    }

    public function delArticle ($id) {
    	$article = Article::find($id);
    	$article->delete();
    	return $article;
    }

    public function showArticle ($id) {
    	$article = Article::find($id);
    	return response()->json($article);
    }

    public function editArticle (Request $request) {
    	$input = $request->input();
    	$article = Article::find($input['id']);
    	$article->tag = $input['tag'];
    	$article->subject = $input['subject'];
    	$article->content = $input['content'];
    	$article->save();
        $article->content = str_limit(strip_tags($article->content),10);
    	return $article;    	
    }

}
