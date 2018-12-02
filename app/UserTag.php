<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTag extends Model
{
    protected $fillable = [
    	'user_id', 'utag',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
