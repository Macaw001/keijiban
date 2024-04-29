<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


	protected $guarded = array('id');

	public function comments() {
		return $this->hasMany('App\Models\Comment');
	}
	    public static $rules = array(
		'title' => 'required',
		'comment' => 'required',
		'user_id' => 'required',
	);
}
