<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    protected $fillable = [
    	'projects_id','user_id','wname'
    ];

    public function projects(){
    	return $this->belongsTo('App\Projects');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
