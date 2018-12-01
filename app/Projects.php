<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'user_id', 'projecttype_id', 'pname', 'pdescription', 'pprice', 'pduration', 'pstatus', 'pketerangan', 'purl',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function projecttype(){
    	return $this->belongsTo('App\ProjectType');
    }
}
