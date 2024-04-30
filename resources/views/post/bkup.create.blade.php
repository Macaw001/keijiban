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

	<form class="form-control-lg" action="/post/create" method="post"> <table> @csrf
	<div  class="row justify-content-center">
		<div class="col-12">
			<tr><th>タイトル </th><td><input type="text" name="title"></td></tr>
		</div>
	</div>
	<div  class="row justify-content-center">
		<div class="col-12">
		 	<tr><th>投稿内容 </th><td><textarea name="comment"></textarea></td></tr> <input type="hidden" name="user_id" value="{{$user->id}}"></td></tr>
		</div>
	</div>
	<div  class="row justify-content-end">
		<div class="col-12">
			 <tr><td class="text-end"><button type="submit">投稿する</button></td></tr> <tr><td>{{ $user->id }}</td></tr> </table>
		
		</div>	
	</div>
	 </form>
	</div>
	</div>	
@endsection
