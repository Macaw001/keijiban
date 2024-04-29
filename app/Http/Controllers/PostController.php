<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
	public function index(Request $request) {
		$posts = Post::all();
	
		return view('post.index', ['posts' => $posts]);
	}

	public function show(Request $request) {
		$post = Post::where('id', $request->id)->first();
		return view('post.show', ['post' => $post]);
	}

	public function edit(Request $request) {
		$post = Post::where('id', $request->id)->first();
		return view('post.edit', ['post' => $post]);
	}

	public function update(Request $request) {
		$id = $request->id;
		$this->validate($request, Post::$rules);
		$post = Post::find($request->id);
		$form = $request->all();
		unset($form['_token']);
		$post->fill($form)->save();
		return redirect("/post/edit?id={$id}")->with('flash_message', '更新が成功しました');
	}	


	public function create() {
		
		return view('post.create');
	}
	public function store(Request $request) {
		$this->validate($request, Post::$rules);
		$post = new Post;

		$form = $request->all();
		unset($form['_token']);
		$post->fill($form)->save();
		return redirect('/post');
	}

	public function destroy(Request $request) {
		Post::find($request->id)->delete();
		return redirect('/post')->with('flash_message', '選択された投稿を削除しました');
	}
}
