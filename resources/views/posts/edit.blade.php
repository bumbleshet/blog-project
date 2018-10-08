@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		  	<div class="panel panel-primary">
		  		<div class="panel-heading"> Edit Post: {{ $post->title }} </div>
		  		<div class="panel-body">
		  			{!! Form::open() !!}
		  				<div class="form-group @if($errors->has('title')) has-error @endif">
							<label class="control-label">@if($errors->has('title')) {{$errors->first('title')}} @else Post Title @endif</label>
							{!! Form::text('title', $post->title, ['class' => 'form-control', 'id' => 'txtTitle', 'placeholder' => 'The Title of your Blog Post']) !!}
						</div>
						<div class="form-group @if($errors->has('body')) has-error @endif">
							<label class="control-label">@if($errors->has('body')) {{$errors->first('body')}} @else Body @endif</label>
							{!! Form::textarea('body', $post->body, ['class' => 'form-control', 'id' => 'txtBody', 'placeholder' => 'The Content of your Blog Post', 'style' => 'height: 100px;']) !!}
						</div>
						<div class="form-group @if($errors->has('category_id')) has-error @endif">
							<label class="control-label">@if($errors->has('category_id')) {{$errors->first('category_id')}} @else Post Category @endif</label>
							{!! Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control']) !!}
						</div>
						{!! Form::submit('Submit Post', ['class' => 'btn btn-success pull-right']) !!}
		  			{!! Form::close() !!}
		  		</div>
		  	</div>
		</div>
	</div>
</div>
@endsection

