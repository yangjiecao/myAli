<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table = 'skills';

	public function belongsToResume()
    {
        return $this->belongsTo('App\Resume', 'resumeId', 'id');
    }
}