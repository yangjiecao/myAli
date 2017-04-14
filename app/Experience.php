<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    protected $table = 'experience';

	public function belongsToResume()
    {
        return $this->belongsTo('App\Resume', 'resumeId', 'id');
    }
}