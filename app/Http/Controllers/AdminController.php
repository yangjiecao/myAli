<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;

use App\Article;

use App\TimeLine;

use App\Resume;

class AdminController extends Controller
{
	public function index () {
		$lists = TimeLine::all();
		return view('admin.index',['lists'=>$lists]);
	}
	public function postAdd (Request $request) {
		date_default_timezone_set('PRC');
		$input = $request->input();
		$timeLine = new TimeLine;
		$timeLine->content = $input['content'];
		$timeLine->type = $input['type'];
		$timeLine->save();
		return $timeLine;
	}
	public function articleList () {
		return view('admin.article.index');
	}
	
	public function getResume () {
		return view('admin.resume.index');
	}

	public function getSkill () {
		return view('admin.resume.skill');
	}

	public function getEducation () {
		return view('admin.resume.education');
	}

	public function getProject () {
		return view('admin.resume.project');
	}

	public function getExperience () {
		return view('admin.resume.experience');
	}

	public function getShuo () {
		return view('admin.shuoshuo.shuoshuo');
	}

	public function getDaily () {
		return view('admin.daily.index');
	}
}