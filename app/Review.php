<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    	'user_id', 'stars', 'reviewsKet',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
