<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userSubject extends Model
{
    protected $table = 'user_subject';

    public $primaryKey = 'id';

    public $timestamps = true; 

}
