<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use App\ArticleCatalog;

use App\User;

use App\Image;

use App\Resume;

use App\Mood;

use App\Motto;

use Crypt;

class HomeController extends Controller
{
	public function getShow()
	{
		$articles = ArticleCatalog::all();
		return response()->json($articles);
	}
	public function getDetail()
	{
		$article = new Article;
		$article->catalogId = 4;
		$article->subject = '测试2';
		$article->content = '关于测试2的内容';
		$article->save();
		return $article;
	}
	public function getEloq()
	{
		$content = ArticleCatalog::find(4)->hasManyArticle()->select('subject','content','created_at')->get();
		return $content;
	}
	public function getIndex () {
		$articles = Article::orderBy('id','DESC')->paginate(3);
		foreach ($articles as $article) {
			$article->content = str_limit(strip_tags($article->content),100);
			$article->riqi = date('Y-m-d',strtotime($article->created_at));
		}
		$techs = Article::where('tag','技术博文')->orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$news = Article::orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$rands = Article::orderByRaw('RAND()')->take(5)->select('id','subject')->get();
		return view('front.index',['lists'=>$articles,'techs'=>$techs,'news'=>$news,'rands'=>$rands]);
	}
	public function getLearn () {
		$articles = Article::where('tag','技术博文')->orWhere('tag','转载')->orderBy('id','DESC')->paginate(3);
		foreach ($articles as $article) {
			$article->content = str_limit(strip_tags($article->content),100);
		}
		$techs = Article::where('tag','技术博文')->orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$news = Article::orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$rands = Article::orderByRaw('RAND()')->take(5)->select('id','subject')->get();
		return view('front.learn',['lists'=>$articles,'techs'=>$techs,'news'=>$news,'rands'=>$rands]);	
	}
	public function getRiji () {
		$dailies = Motto::all();
		$techs = Article::where('tag','技术博文')->orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$news = Article::orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$rands = Article::orderByRaw('RAND()')->take(5)->select('id','subject')->get();
		return view('front.riji', ['techs'=>$techs,'news'=>$news,'rands'=>$rands,'dailies'=>$dailies]);		
	}
	public function getImage () {
		$images =Image::all();
		return view('front.xc',['lists'=>$images]);
	}
	public function getAbout () {
		$introduction = Resume::first()->value('introduction');
		$techs = Article::where('tag','技术博文')->orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$news = Article::orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$rands = Article::orderByRaw('RAND()')->take(5)->select('id','subject')->get();
		return view('front.about',['introduction'=>$introduction,'techs'=>$techs,'news'=>$news,'rands'=>$rands]);
	}
	public function getShuo () {
		$moods = Mood::all();
		foreach ($moods as $mood) {
			$mood->date = date('Y-m-d', strtotime($mood->created_at));
		}
		return view('front.shuo',['moods'=>$moods]);
	}
	public function getGuestbook () {
		$techs = Article::where('tag','技术博文')->orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$news = Article::orderBy('id','DESC')->take(5)->select('id','subject')->get();
		$rands = Article::orderByRaw('RAND()')->take(5)->select('id','subject')->get();
		return view('front.guestbook',['techs'=>$techs,'news'=>$news,'rands'=>$rands]);		
	}
}