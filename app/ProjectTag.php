<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    protected $fillable = [
    	'projects_id','ptag',
    ];

    public function projects(){
    	return $this->belongsTo('App\Projects');
    }
}
