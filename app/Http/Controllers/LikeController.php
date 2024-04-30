<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
class LikeController extends Controller
{
	public function store (Request $request) {
		$this->validate($request, Like::$rules);
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
