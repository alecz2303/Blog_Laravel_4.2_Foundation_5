@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')



	{{-- Edit Blog Form --}}
	<form data-abide class="form-horizontal" method="post" action="@if (isset($post)){{ URL::to('admin/blogs/' . $post->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->
<dl class="tabs" data-tab> 
	<dd class="active"><a href="#panel1">General</a></dd> 
	<dd><a href="#panel2">Meta data</a></dd> 
</dl> 
<div class="tabs-content"> 
		<div class="content active" id="panel1"> 
			<!-- Post Title -->
            <label class="control-label" for="title">Post Title <small>required</small>
			<input required class="form-control" type="text" name="title" id="title" value="{{{ Input::old('title', isset($post) ? $post->title : null) }}}" />
			</label>
			<small class="error">This field is required</small>
			<!-- ./ post title -->

			<!-- Content -->
            <label class="control-label" for="content">Content</label>
			<textarea class="form-control full-width wysihtml5 error" name="content" value="content" rows="10">{{{ Input::old('content', isset($post) ? $post->content : null) }}}</textarea>
			{{{ $errors->first('content', '<span class="help-block">:message</span>') }}}
			<small class="error">This field is required</small>
			<!-- ./ content -->
		</div> 
		<div class="content" id="panel2"> 
			<!-- Meta Title -->
			<div class="form-group {{{ $errors->has('meta-title') ? 'error' : '' }}}">
				<div class="col-md-12">
                    <label class="control-label" for="meta-title">Meta Title</label>
					<input class="form-control" type="text" name="meta-title" id="meta-title" value="{{{ Input::old('meta-title', isset($post) ? $post->meta_title : null) }}}" />
					{{{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}}
				</div>
			</div>
			<!-- ./ meta title -->

			<!-- Meta Description -->
			<div class="form-group {{{ $errors->has('meta-description') ? 'error' : '' }}}">
				<div class="col-md-12 controls">
                    <label class="control-label" for="meta-description">Meta Description</label>
					<input class="form-control" type="text" name="meta-description" id="meta-description" value="{{{ Input::old('meta-description', isset($post) ? $post->meta_description : null) }}}" />
					{{{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}}
				</div>
			</div>
			<!-- ./ meta description -->

			<!-- Meta Keywords -->
			<div class="form-group {{{ $errors->has('meta-keywords') ? 'error' : '' }}}">
				<div class="col-md-12">
                    <label class="control-label" for="meta-keywords">Meta Keywords</label>
					<input class="form-control" type="text" name="meta-keywords" id="meta-keywords" value="{{{ Input::old('meta-keywords', isset($post) ? $post->meta_keywords : null) }}}" />
					{{{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}}
				</div>
			</div>
			<!-- ./ meta keywords -->
		</div> 

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<element class="button secondary close_popup">Cancel</element>
				<button type="reset" class="alert">Reset</button>
				<button type="submit" class="success">Update</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>

	
</div>
@stop
