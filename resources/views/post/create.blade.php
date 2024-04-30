@php
	$user = Auth::user();
@endphp

@extends('layouts.postapp')

@section('title', '投稿用フォラーム')

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

	<form class="form-control-lg" action="/post/create" method="post"> 
	 @csrf
	<div  class="mb-3 row justify-content-center">
		<div class="col-12">
			タイトル<input type="text" name="title">
		</div>
	</div>
	<div  class="mb-3 row justify-content-center">
		<div class="col-12">
			投稿内容<textarea name="comment"></textarea> <input type="hidden" name="user_id" value="{{$user->id}}">
		</div>
	</div>
	<div  class="row justify-content-end">
		<div class="d-flex justify-content-center">
			<button type="submit">投稿する</button>	
		</div>	
	</div>
	 </form>
	</div>
	</div>	
@endsection
