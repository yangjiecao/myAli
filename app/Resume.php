<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    protected $table = 'resume';

    public function hasManySkills()
    {
        return $this->hasMany('App\Skill', 'resumeId', 'id');
    }

    public function hasManyEducation()
    {
        return $this->hasMany('App\Education', 'resumeId', 'id');
    }

    public function hasManyProject()
    {
        return $this->hasMany('App\Project', 'resumeId', 'id');
    }

    public function hasManyExperience()
    {
        return $this->hasMany('App\Experience', 'resumeId', 'id');
    }
}