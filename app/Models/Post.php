<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;


	protected $guarded = array('id');

	public function comments() {
		return $this->hasMany('App\Models\Comment');
	}
	public function likes() {
	    	return $this->hasMany('App\Models\Like');
	}	
	public static $rules = array(
		'title' => 'required',
		'comment' => 'required',
		'user_id' => 'required',
	);
}
