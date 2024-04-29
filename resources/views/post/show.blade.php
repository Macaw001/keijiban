@extends('layouts.postapp')

@section('content')

	<div style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
		<h3 style="margin: 10px">{{$post->title}}</h3>
		<ul><li>{{$post->comment}}</li></ul>
		<ul><li><a href="./edit?id={{$post->id}}">編集する</a></li></ul>
	</div>
	<a href="post/create">投稿をする</a>
@endsection
