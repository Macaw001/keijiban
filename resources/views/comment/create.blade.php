@php
	$user = Auth::user();
@endphp

@extends('layouts.postapp')

@section('title', 'コメント用フォラーム')

@section('content')

	<div class="container">
	@if (count($errors) > 0)
	<div>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	 <form class="form-control" action="/comment/create" method="post">
	<table>
		@csrf
		<tr><th>コメント</th><td><textarea name="comment" style="width:500px; height: 300px;"></textarea></td></tr>
		<input type="hidden" name="user_id" value="{{$user->id}}">
		<input type="hidden" name="post_id" value="{{$post}}">
		</table>
		<div class="d-flex justify-content-center">
		<button type="submit">投稿する</button>
		</div>
	</form>
	</div>
@endsection
