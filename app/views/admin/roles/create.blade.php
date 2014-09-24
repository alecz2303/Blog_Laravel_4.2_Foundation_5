@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
	<dl class="tabs" data-tab>
		<dd class="active"><a href="#general">General</a></dd>
		<dd><a href="#permissions">Permisions</a></dd>
	</dl>
	<!-- ./ tabs -->

	{{-- Create Role Form --}}
	<form data-abide class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tabs-content">
			<!-- Tab General -->
			<div class="content active" id="general">
				<!-- Name -->
				<div class="name-field">
					<label for="name">Name
    					<input required pattern="[a-zA-Z]+" class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name') }}}" />
    				</label>
    				<small class="error">Nombre es campo obligatorio y tipo texto.</small>
				</div>
				<!-- ./ name -->
			</div>
			<!-- ./ tab general -->

	        <!-- Permissions tab -->
	        <div class="content" id="permissions">
                <div class="form-group">
                    @foreach ($permissions as $permission)
                    <label>
                        <input type="hidden" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="0" />
                        <input type="checkbox" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="1"{{{ (isset($permission['checked']) && $permission['checked'] == true ? ' checked="checked"' : '')}}} />
                        {{{ $permission['display_name'] }}}
                    </label>
                    @endforeach
                </div>
	        </div>
	        <!-- ./ permissions tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
				<element class="button secondary close_popup">Cancel</element>
				<button type="reset" class="alert">Reset</button>
				<button type="submit" class="success">Create Role</button>
		<!-- ./ form actions -->
	</form>
@stop
