<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    protected $fillable = [
    	'projects_id','ptag',
    ];

    public function user(){
    	return $this->belongsTo('App\Projects');
    }
}
