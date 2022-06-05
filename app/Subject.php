<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function users() {
        return $this->belongsToMany('App\User', 'user_subject', 'subject_id', 'user_id'); 
    }

    public function assignmentsToSubjects() {
        return $this->belongsToMany('App\Assignment', 'assignment_subject', 'assignment_id', 'subject_id');
    }

}
