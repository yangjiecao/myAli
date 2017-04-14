<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCatalog extends Model
{
    //
    use SoftDeletes;
    protected $table = 'articleCatalog';
    protected $dates = ['deleted_at'];
    public function hasManyArticle()
    {
    	return $this->hasMany('App\Article', 'catalogId', 'id');
    }
}