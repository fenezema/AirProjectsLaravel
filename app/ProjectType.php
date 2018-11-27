<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $fillable = [
    	'type_name',
    ];

    public function projects(){
    	return $this->hasMany('App\Projects');
    }
}
