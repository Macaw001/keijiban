@php
	$user = Auth::user();
@endphp

@extends('layouts.postapp')


@section('content')

<div class="container">

		<!--エラーメッセージの表示-->
		@if (count($errors) > 0)
		<div>
			<ul class="list-unstyled">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif	
		
		<!-- flash message -->
		@if (session('flash_message'))
			<div class="flash_message">
				{{ session('flash_message') }}
			</div>
		@endif
		
		@foreach ($posts as $post)
		<div class="p-0 m-3"  style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
			 <div class="bg-dark">
				<a class="text-decoration-none" href="/post/show?id={{$post->id}}"><h3 class="text-wrap text-white" style="max-width:100%">{{$post->title}}</h3></a>
			</div>

		<!-- いいねボタンの追加 -->

			<div class="justify-content-end d-flex btn-group">
				
				@if ($post->likes->contains('user_id', $user->id))
					<i class="fa-solid fa-heart" style="color: #c73d59;"></i>{{$post->likes->count()}} いいね</td></tr>
				@else
				<form action="/like" method="post">
				@csrf
					<button type="input"><i class="fa-solid fa-heart" style="color: #aeb0b2;"></i>{{$post->likes->count()}}  いいね</button></td></tr>
					<input type="hidden" name="post_id" value="{{$post->id}}">
					<input type="hidden" name="user_id" value="{{$user->id}}">
				</form>
				@endif			

				<!-- likeテーブルのユーザーidとログインidが一致したら、いいねの取り消しを表示する -->	
				@foreach ($post->likes as $like)
					@if ($like->user_id === $user->id)
						<form action="/like" method="post">
							@csrf
							@method('DELETE')
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="id" value="{{$like->id}}">
							<td><button type="submit">いいねを取り消す</button></td>
							</input>
						</form>
					@endif
				@endforeach
			</div>

		<!-- 掲示板のポストを表示 -->
			<table>
			<div class="alert">
				<td>{{$post->comment}}</td>
				<form action="/like" method="post">
				<td>
					@csrf
					<input type="hidden" value="{{$post->id}}" name="post_id">
					<input type="hidden" value="{{$user->id}}" name="user_id">
					

			</table>
				
				<!-- 返信コメントの表示 -->	
				@foreach ($post->comments as $comment)
				<div class="border-top mb-0">
					<ul class="list-unstyled pt-3 pb-3 mt-3 mb-0"><li>{{$comment->comment}}</li></ul>
					<div class="d-flex justify-content-end">
					@if ($comment->user_id === $user->id)
						<a  class="btn btn-primary" href="/comment/edit?id={{$comment->id}}">編集する</a>

						<form action="/comment/edit" method="post">
						@csrf
						@method('DELETE')
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="id" value="{{$comment->id}}">
						<button class="btn btn-danger" type="submit">削除</button>
						</input>
						</form>	
						@endif
					</div>
				</div>
				@endforeach

				<div class="mt-3 d-flex justify-content-between">
					<a href="/comment?id={{$post->id}}">この投稿にコメントする</a>
					<!--　ログインしているヒトのみ投稿できる仕組み　-->
					@if ($post->user_id === $user->id)
					<div class="d-flix justify-content-end">
						<a class="btn btn-primary" href="/post/edit?id={{$post->id}}">編集する</a>
						<form action="./post" method="post">
						@csrf
						@method('DELETE')
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="id" value="{{$post->id}}">
						<button class="btn btn-danger" type="submit">削除</button>
						</input>
						</form>	
						@endif
					</div>
				</div>
			</div>
		</div>
		@endforeach
	<a class="btn btn-primary" href="/post/create">投稿をする</a>
</div>	
@endsection
