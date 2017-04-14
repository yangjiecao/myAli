<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;

use App\Test;

use App\Memor;

use App\Resume;

use App\Skill;

use App\Education;

use App\Project;

use App\Experience;

use App\Mood;

use App\Motto;

class ApiController extends Controller
{
    protected $pageSize = 10; 
	public function myMsg () {
		$resume = Resume::first();
		$resume->skills = $resume->hasManySkills;
		$resume->education = $resume->hasManyEducation;
		$resume->project = $resume->hasManyProject;
		$resume->experience = $resume->hasManyExperience;
		unset($resume->hasManySkills, $resume->hasManyEducation, $resume->hasManyProject, $resume->hasManyExperience);
		return response()->json($resume);
	}
	public function postMsg (Request $request) {
		$input = $request->input();
		$resume = Resume::first();
		$resume->name = $input['name'];
		$resume->professional = $input['professional'];
		$resume->introduction = $input['introduction'];
		$resume->address = $input['address'];
		$resume->Tel = $input['Tel'];
		$resume->Email = $input['Email'];
		$resume->url = $input['url'];
		$resume->save();
		if($request->hasFile('file')){
			$file = $request->file('file');
			$file->move('public/resume/images', 'avatar.jpg');
		}
		return response()->json($resume);
	}
	public function resumeBasic () {
		$resume = Resume::first();
		return response()->json($resume);
	}
	public function getMemor () {
		date_default_timezone_set('PRC');
		$year = date('Y', time());
		$month = date('m', time());
		$memors = Memor::where(['year'=>$year])->get();
		return response()->json(['errCode'=>0,'msg'=>'请求成功','memors'=>$memors]);		
	}
	public function postMemor (Request $request) {
		date_default_timezone_set('PRC');
		$input = $request->input();
		$year = date('Y', strtotime($input['date']));
		$month = date('m', strtotime($input['date']));
		$date = date('d', strtotime($input['date']));
		$memor = Memor::where(['year'=>$year,'month'=>$month,'date'=>$date])->first();
		if(is_null($memor)){
			$memor = new Memor;
			$memor->content = $input['content'];
			$memor->year = $year;
			$memor->month = $month;
			$memor->date = $date;
			$memor->save();
		}else{
			$memor->content = $input['content'];
			$memor->year = $year;
			$memor->month = $month;
			$memor->date = $date;
			$memor->save();
		}
		return response()->json(['errCode'=>0,'msg'=>'发表成功']);
	}
	public function getSkill ($resumeId=1) {
		$skill = Skill::where('resumeId', $resumeId)->get();
		return response()->json($skill);
	}
	public function getEditSkill ($id) {
		$skill = Skill::find($id);
		return response()->json($skill);
	}
	public function editSkill (Request $request) {
		$input = $request->input();
		$skill = Skill::find($input['id']);
		$skill->name = $input['name'];
		$skill->degree = $input['degree'];
		$skill->description = $input['description'];
		$skill->save();
		return $skill;
	}
	public function postSkill (Request $request) {
		$input = $request->input();
		$skill = new Skill;
		$skill->resumeId = $input['resumeId'];
		$skill->name = $input['name'];
		$skill->degree = $input['degree'];
		$skill->description = $input['description'];
		$skill->save();
		return $skill;
	}
	public function delSkill ($id) {
		$skill = Skill::find($id);
		$skill->delete();
		return $skill;
	}
	public function getEducation ($resumeId=1) {
		$educations = Education::where('resumeId', $resumeId)->get();
		return response()->json($educations);
	}
	public function postEducation (Request $request) {
		$input = $request->input();
		$education = new Education;
		$education->resumeId = $input['resumeId'];
		$education->name = $input['name'];
		$education->major = $input['major'];
		$education->degree = $input['degree'];
		$education->introduction = $input['introduction'];
		$education->startTime = $input['startTime'];
		$education->endTime = $input['endTime'];
		$education->save();
		return $education;
	}

	public function delEducation ($id) {
		$education = Education::find($id);
		$education->delete();
		return $education;
	}

	public function getEditEducation ($id) {
		$education = Education::find($id);
		return response()->json($education);
	}

	public function editEducation (Request $request) {
		$input = $request->input();
		$education = Education::find($input['id']);
		$education->name = $input['name'];
		$education->degree = $input['degree'];
		$education->major = $input['major'];
		$education->introduction = $input['introduction'];
		$education->startTime = $input['startTime'];
		$education->endTime = $input['endTime'];
		$education->save();
		return $education;
	}

	public function postProject (Request $request) {
		$input = $request->input();
		$project = new Project;
		$project->resumeId = $input['resumeId'];
		$project->name = $input['name'];
		$project->description = $input['description'];
		$project->url = $input['url'];
		$project->save();
		return $project;
	}

	public function getProject ($resumeId=1) {
		$project = Project::where('resumeId', $resumeId)->get();
		return response()->json($project);
	}

	public function editProject (Request $request) {
		$input = $request->input();
		$project = Project::find($input['id']);
		$project->name = $input['name'];
		$project->url = $input['url'];
		$project->description = $input['description'];
		$project->save();
		return $project;
	}

	public function getEditProject ($id) {
		$project = Project::find($id);
		return response()->json($project);
	}

	public function delProject ($id) {
		$project = Project::find($id);
		$project->delete();
		return $project;
	}

	public function getExperience ($resumeId=1) {
		$experience = Experience::where('resumeId', $resumeId)->get();
		return response()->json($experience);
	}

	public function postExperience (Request $request) {
		$input = $request->input();
		$experience = new Experience;
		$experience->resumeId = $input['resumeId'];
		$experience->company = $input['company'];
		$experience->professional = $input['professional'];
		$experience->duty = $input['duty'];
		$experience->startTime = $input['startTime'];
		if(!isset($input['endTime'])){
			$experience->endTime = null;
		}else{
			$experience->endTime = $input['endTime'];
		}
		$experience->save();
		return $experience;
	}

	public function getEditExperience ($id) {
		$experience = Experience::find($id);
		return response()->json($experience);
	}

	public function editExperience (Request $request) {
		$input = $request->input();
		$experience = Experience::find($input['id']);
		$experience->company = $input['company'];
		$experience->startTime = $input['startTime'];
		$experience->endTime = $input['endTime'];
		$experience->professional = $input['professional'];
		$experience->duty = $input['duty'];
		$experience->save();
		return $experience;
	}

	public function delExperience ($id) {
		$experience = Experience::find($id);
		$experience->delete();
		return $experience;		
	}

	public function getMood ($currentPage=1) {
        $lists = Mood::getList($currentPage, $this->pageSize);
        foreach ($lists as $list) {
        	$list->content = str_limit(strip_tags($list->content),20);
        }
        return $lists;
	}

	public function addMood (Request $request) {
		$input = $request->input();
		$mood = new Mood;
		$mood->content = $input['content'];
		$mood->save();
		$mood->content = str_limit(strip_tags($input['content']),20);
		return $mood;
	}

	public function showMood ($id=1) {
		$mood = Mood::find($id);
		return response()->json($mood);
	}

	public function editMood (Request $request) {
		$input = $request->input();
		$mood = Mood::find($input['id']);
		$mood->content = $input['content'];
		$mood->save();
		$mood->content = str_limit(strip_tags($input['content']),20);
		return $mood;
	}

	public function delMood ($id) {
		$mood = Mood::find($id);
		$mood->delete();
		return $mood;		
	}

	public function getMotto ($currentPage=1) {
        $lists = Motto::getList($currentPage, $this->pageSize);
        foreach ($lists as $list) {
        	$list->content = str_limit(strip_tags($list->content),20);
        }
        return $lists;
	}

	public function addMotto (Request $request) {
		$input = $request->input();
		$motto = new Motto;
		$motto->content = $input['content'];
		$motto->save();
		$motto->content = str_limit(strip_tags($input['content']),20);
		return $motto;
	}

	public function showMotto ($id=1) {
		$motto = Motto::find($id);
		return response()->json($motto);
	}

	public function editMotto (Request $request) {
		$input = $request->input();
		$motto = Motto::find($input['id']);
		$motto->content = $input['content'];
		$motto->save();
		$motto->content = str_limit(strip_tags($input['content']),20);
		return $motto;
	}

	public function delMotto ($id) {
		$motto = Motto::find($id);
		$motto->delete();
		return $motto;		
	}

}