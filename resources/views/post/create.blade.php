@php
	$user = Auth::user();
@endphp

@extends('layouts.postapp')

@section('title', '投稿用フォラーム')

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

	<form action="/post/create" method="post">
	<table>
		@csrf
		<tr><th>タイトル </th><td><input type="text" name="title"></td></tr>
		<tr><th>投稿内容 </th><td><textarea name="comment"></textarea></td></tr>
		<input type="hidden" name="user_id" value="{{$user->id}}">
		<tr><td><button type="submit">投稿する</button></td></tr>
		<tr><td>{{ $user->id }}</td></tr>
	</table>
	</form>
@endsection
