<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
	public function create(Request $request) {
		$post = $request->id;
		return view('comment.create', ['post' => $post]);
	}

	public function store(Request $request) {
		$this->validate($request, Comment::$rules);
		$comment = new Comment;

		$form = $request->all();
		unset($form['_token']);
		$comment->fill($form)->save();
		return redirect('/post')->with('flash_message', '返信が完了しました');
	}
	
	public function edit(Request $request) {
		$comment = Comment::where('id', $request->id)->first();
		return view('comment.edit', ['comment' => $comment]);
	}

	public function update(Request $request) {
		$id = $request->id;
		$this->validate($request, Comment::$rules);
		$comment = Comment::find($request->id);
		$form = $request->all();
		unset($form['_token']);
		$comment->fill($form)->save();
		return redirect("/comment/edit?id={$id}")->with('flash_message', '更新が成功しました');
	}	

	public function destroy(Request $request) {
		Comment::find($request->id)->delete();
		return redirect('/post')->with('flash_message', '選択されたコメントを削除しました');
	}
		
}
