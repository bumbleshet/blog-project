@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <a href="{{ route('add post') }}" class="btn btn-xs btn-success" >Add New Post</a>
       </div>
   </div>
   <hr>
   @foreach($posts as $post)
	   <div class="row">
		   	<div class="col-md-8 col-md-offset-2">
	   			<div class="panel">
	   				<div class="panel-title">
				   		<h2 class="panel-heading" > 
							@if($userId == $post->user_id)
						   			<a href="{{ route('edit post', ['id' => $post->id]) }}"> {{ $post->title }} </a> 
							@else
								{{ $post->title }}
							@endif
						</h2>
	   				</div>
		   			<div class="panel-body">
				   		<p>{{ $post->body }}</p>
				   		<b> {{ $categories[$post->category_id] }} </b>
		   			</div>
		   		</div>
	   		</div>
	   </div>
   @endforeach
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
   			{!! $posts->links() !!}
       </div>
   </div>
</div>
@endsection
