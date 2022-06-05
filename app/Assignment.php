<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';

    public $primaryKey = 'id';

    public $timestamps = true; 

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function subjectsToAssignments() {
        return $this->belongsToMany('App\Subject', 'assignment_subject', 'assignment_id', 'subject_id'); 
    }

    public function subjectAssignment($id)
    {
        if ($this->subjectsToAssignments()->where('subject_id', $id)->get()) {
            return true;
        }
        return false;
    }
 
}
