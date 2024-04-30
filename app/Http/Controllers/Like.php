<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;

class Like extends Controller
{
	public function store (Request $requets) {
		$this->validate($request, Likes::$rules);
		$like = new Like;
		$form = $request->all();
		unset($form['_token']);
		$like->fill($form)->save();
		return redirect ('/post')->with('flash_message', 'いいねを押しました');
	}
	public function destroy (Request $request) {
		Like::find($request->id)->delete();
		return redirect('/post')->with('flash_message', 'いいねを取り消しました');
	}
		

}
