<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //
    use SoftDeletes;
    protected $table = 'article';
    protected $dates = ['deleted_at'];
	public static function getList($currentPage, $pageSize){
		$article = new static;
        $articles = $article::paginate($pageSize, ['*'], 'page', $currentPage);
		return $articles;
	}
}