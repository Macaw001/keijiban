@php
	$user = Auth::user();
@endphp

@extends('layouts.postapp')

@section('content')
	<!-- flash message -->
	@if (session('flash_message'))
		<div class="flash_message">
			{{ session('flash_message') }}
		</div>
	@endif
	
	@foreach ($posts as $post)
	<div style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
		<a href="/post/show?id={{$post->id}}"><h3 style="margin: 10px">{{$post->title}}</h3></a>
		<ul><li>{{$post->comment}}</li></ul>

		<!-- 返信コメントの表示 -->	
		@foreach ($post->comments as $comment)
		<div style="margin: 10px; padding:0px; border:solid black 1px; width:80%;">
		<ul><li>{{$comment->comment}}</li></ul>
		@if ($comment->user_id === $user->id)
			<a href="/comment/edit?id={{$comment->id}}">編集する</a>
			<li>comment_user_id:{{$comment->user_id}}</li>
			<li>user_id:{{$user->id}}</li>

			<form action="/comment/edit" method="post">
			@csrf
			@method('DELETE')
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="id" value="{{$comment->id}}">
			<button type="submit">削除</button>
			</input>
			</form>	
		@endif
		</div>
	       	@endforeach

		<a href="/comment?id={{$post->id}}">この投稿にコメントする</a>

		@if ($post->user_id === $user->id)
		<ul>
			<li><a href="/post/edit?id={{$post->id}}">編集する</a></li>
			<form action="./post" method="post">
			@csrf
			@method('DELETE')
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="id" value="{{$post->id}}">
			<button type="submit">削除</button>
			</input>
			</form>	
		@endif
	</div>
	@endforeach
	<a href="/post/create">投稿をする</a>
@endsection
