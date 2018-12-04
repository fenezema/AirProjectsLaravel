<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'user_id', 'projecttype_id', 'worker_id', 'worker_names','pname', 'pdescription', 'pprice', 'pduration', 'ptags', 'pstatus', 'pketerangan', 'purl',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function projecttype(){
    	return $this->belongsTo('App\ProjectType');
    }

    public function projecttag(){
    	return $this->hasMany('App\ProjectTag');
    }

    public function penawaran(){
        return $this->hasMany('App\Penawaran');
    }   
}
