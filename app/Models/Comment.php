<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Post;

class Comment extends Model
{
    use HasFactory;

	protected $guarded = array('id');

	public function comments() {
		return $this->hasMany('App\Models\Post');
	}
	    public static $rules = array(
		'post_id' => 'required',
		'comment' => 'required',
		'user_id' => 'required',
	);
	
}
