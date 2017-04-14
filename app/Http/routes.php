<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('front.index');
// });

Route::get('/', 'HomeController@getIndex');

// Route::get('/about', function () {
// 	return view('front.about');
// });
Route::get('about', 'HomeController@getAbout');

Route::get('guestbook', 'HomeController@getGuestbook');
// Route::get('/guestbook', function () {
// 	return view('front.guestbook');
// });

Route::get('/learn', 'HomeController@getLearn');
// Route::get('/learn', function () {
// 	return view('front.learn');
// });

Route::get('riji', 'HomeController@getRiji');
// Route::get('/riji', function () {
// 	return view('front.riji');
// });

Route::get('shuo', 'HomeController@getShuo');
// Route::get('/shuo', function () {
// 	return view('front.shuo');
// });

Route::get('xc', 'HomeController@getImage');
// Route::get('/xc', function () {
// 	return view('front.xc');
// });

Route::get('view/{id?}', 'ArticleController@getShow');
// Route::get('/view', function () {
// 	return view('front.view');
// });

Route::get('/login', function () {
	return view('admin.login');
});

Route::group(['middleware' => 'adminAuth','prefix'=>'admin'], function () {
	Route::get('/','AdminController@index');
	Route::get('/article', 'AdminController@articleList');
	Route::get('/resume', 'AdminController@getResume');
	Route::get('/skill', 'AdminController@getSkill');
	Route::get('/education', 'AdminController@getEducation');
	Route::get('/project', 'AdminController@getProject');
	Route::get('/experience', 'AdminController@getExperience');
	Route::get('shuo', 'AdminController@getShuo');
	Route::get('daily', 'AdminController@getDaily');
});


Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');


Route::get('/resume', 'IndexController@resume');
Route::get('/testdb', 'IndexController@testDB');
Route::any('/wechat', 'IndexController@wechat');

Route::group(['prefix'=>'api'], function () {
	Route::get('/myMsg', 'ApiController@myMsg');
	Route::get('/basicMsg', 'ApiController@resumeBasic');
	Route::post('/myMsg', 'ApiController@postMsg');
	Route::get('/memor', 'ApiController@getMemor');
	Route::post('/memor', 'ApiController@postMemor');
	Route::get('skill/{resumeId?}', 'ApiController@getSkill');
	Route::get('skill/edit/{id?}', 'ApiController@getEditSkill');
	Route::post('skill/edit', 'ApiController@editSkill');
	Route::post('/skill', 'ApiController@postSkill');
	Route::delete('skill/del/{id}','ApiController@delSkill');
	Route::get('education/{resumeId?}', 'ApiController@getEducation');
	Route::get('education/edit/{id?}', 'ApiController@getEditEducation');
	Route::post('education/edit', 'ApiController@editEducation');
	Route::delete('education/del/{id}','ApiController@delEducation');
	Route::post('/education', 'ApiController@postEducation');
	Route::get('project/{resumeId?}', 'ApiController@getProject');
	Route::post('/project', 'ApiController@postProject');
	Route::get('project/edit/{id?}', 'ApiController@getEditProject');
	Route::post('project/edit', 'ApiController@editProject');
	Route::delete('project/del/{id}','ApiController@delProject');
	Route::get('experience/{resumeId?}', 'ApiController@getExperience');
	Route::post('/experience', 'ApiController@postExperience');
	Route::get('experience/edit/{id?}', 'ApiController@getEditExperience');
	Route::post('experience/edit', 'ApiController@editExperience');
	Route::delete('experience/del/{id}','ApiController@delExperience');
	Route::get('article/lists/{currentPage?}', 'ArticleController@getLists');
	Route::post('article', 'ArticleController@addArticle');
	Route::delete('article/del/{id}', 'ArticleController@delArticle');
	Route::get('article/show/{id}', 'ArticleController@showArticle');
	Route::post('article/edit', 'ArticleController@editArticle');
	Route::get('mood/lists/{currentPage?}', 'ApiController@getMood');
	Route::post('mood', 'ApiController@addMood');
	Route::get('mood/show/{id?}', 'ApiController@showMood');
	Route::post('mood/edit', 'ApiController@editMood');
	Route::delete('mood/del/{id}', 'ApiController@delMood');
	Route::get('motto/lists/{currentPage?}', 'ApiController@getMotto');
	Route::post('motto', 'ApiController@addMotto');
	Route::get('motto/show/{id?}', 'ApiController@showMotto');
	Route::post('motto/edit', 'ApiController@editMotto');
	Route::delete('motto/del/{id}', 'ApiController@delMotto');
});

Route::controllers([
	'home' => 'HomeController',
	// 'api/article' => 'ArticleController'
]);


