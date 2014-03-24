@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Create a New Blog Post ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
		Create a New Blog Post

		<div class="pull-right">
			<a href="{{ route('blogs') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h3>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-meta-data" data-toggle="tab">Meta Data</a></li>
</ul>

<form class="form-horizontal" role="form" method="post" action="">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<!-- Post Title -->

			<div class="form-group {{ $errors->first('title', 'has-error') }}">
				<label for="title" class="col-sm-2 control-label">Post Title</label>
					<div class="col-sm-10">
						<input type="email" id="title" name="title" class="form-control" placeholder="Post Title" value="{{ Input::old('title') }}">
						{{ $errors->first('title', '<span class="help-block">:message</span>') }}
					</div>
			</div>

			<!-- Post Slug -->
			<div class="form-group {{ $errors->first('slug', 'has-error') }}">
				<label for="slug" class="col-sm-2 control-label">Slug</label>
				<div class="col-sm-10 input-group">
					<span class="input-group-addon">
						{{ str_finish(URL::to('/'), '/') }}
					</span>
					<input type="text" id="slug" name="slug" class="form-control" value="{{ Input::old('slug') }}">
					{{ $errors->first('slug', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Content -->
			<div class="form-group {{ $errors->first('content', 'has-error') }}">
				<label for="content" class="col-sm-2 control-label">Content</label>
				<div class="col-sm-10">
					<textarea rows="4" id="content" name="content" class="form-control">{{ Input::old('content') }}</textarea>
					{{ $errors->first('content', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		</div>

		<!-- Meta Data tab -->
		<div class="tab-pane" id="tab-meta-data">
			<!-- Meta Title -->
			<div class="form-group {{ $errors->first('meta-title', 'has-error') }}">
				<label for="meta-title" class="col-sm-2 control-label">Meta Title</label>
					<div class="col-sm-10">
						<input type="text" id="meta-title" name="meta-title" class="form-control" value="{{ Input::old('meta-title') }}">
						{{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}
					</div>
			</div>

			<!-- Meta Description -->
			<div class="form-group {{ $errors->first('meta-description', 'has-error') }}">
				<label for="meta-description" class="col-sm-2 control-label">Meta Description</label>
					<div class="col-sm-10">
						<input type="text" id="meta-description" name="meta-description" class="form-control" value="{{ Input::old('meta-description') }}">
						{{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}
					</div>
			</div>

			<!-- Meta Keywords -->
			<div class="form-group {{ $errors->first('meta-keywords', 'has-error') }}">
				<label for="meta-keywords" class="col-sm-2 control-label">Meta Keywords</label>
					<div class="col-sm-10">
						<input type="text" id="meta-keywords" name="meta-keywords" class="form-control" value="{{ Input::old('meta-keywords') }}">
						{{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}
					</div>
			</div>

		</div>
	</div>

	<!-- Form actions -->
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a class="btn btn-link" href="{{ route('blogs') }}">Cancel</a>
		  	<button type="submit" class="btn btn-default">Publish</button>
		</div>
  	</div>

</form>
@stop
