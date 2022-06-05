<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assignmentSubject extends Model
{
    protected $table = 'assignment_subject';

    public $primaryKey = 'id';

    public $timestamps = true; 
}
