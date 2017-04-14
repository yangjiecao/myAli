<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    //
    use SoftDeletes;
    protected $table = 'test';
    protected $dates = ['deleted_at'];
}