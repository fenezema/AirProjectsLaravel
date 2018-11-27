<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $fillable = [
    	'user_id', 'asalUser_id', 'req_msg',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
