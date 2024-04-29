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

	<div style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
	
	@if (count($errors) > 0)
	<div>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif	
	
	
	<form action="./edit?id={{$post->id}}" method="post">
	@csrf
	<table>
		<tr><td><input type="text" name="title" value="{{$post->title}}{{old('title')}}"</td><tr>
		<tr><td><textarea name="comment">{{$post->comment}}{{old('comment')}}</textarea></td></tr>		
		<input type="hidden" name="user_id"  value="{{$user->id}}"> <tr><td><button type="submit">更新する</button></td></tr>		
	</form>
	</div>
	<a href="post/create">投稿をする</a>
@endsection
