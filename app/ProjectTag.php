<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    protected $fillable = [
    	'user_id','tag',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
