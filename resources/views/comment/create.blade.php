@php
	$user = Auth::user();
@endphp

@extends('layouts.postapp')

@section('title', 'コメント用フォラーム')

@section('content')

	@if (count($errors) > 0)
	<div>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="/comment/create" method="post">
	<table>
		@csrf
		<tr><th>コメント</th><td><textarea name="comment"></textarea></td></tr>
		<input type="hidden" name="user_id" value="{{$user->id}}">
		<input type="hidden" name="post_id" value="{{$post}}">
		<tr><td><button type="submit">投稿する</button></td></tr>
		<tr><td>user_id:{{ $user->id }}</td></tr>
		<tr><td>post_id:{{ $post}}</td></tr>
	</table>
	</form>
@endsection
