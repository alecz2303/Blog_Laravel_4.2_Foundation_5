@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

	{{-- Create User Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif" autocomplete="off" data-abide>
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs -->
		<dl class="tabs" data-tab> 
			<dd class="active"><a href="#panel1">General</a></dd> 
		</dl> 

		<!-- Tabs Content -->
		<div class="tabs-content">
			<!-- General tab -->
			<div class="content active" id="panel1">
				<!-- username -->
				<div class="name-field">
					<label class="col-md-2 control-label" for="username">Username
						<input required pattern="[a-zA-Z]+" type="text" name="username" id="username" value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}" />
					</label>
					<small class="error">El nombre es requerido y de tipo texto.</small>
				</div>
				<!-- ./ username -->

				<!-- Email -->
				<div class="email-field">
					<label>Email
						<input type="email" required name="email" id="email" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
					</label>
					<small class="error">La direccion e-mail es requerida.</small>
				</div>
				<!-- ./ email -->

				<!-- Password -->
				<div class="password-field">
					<label>Password
						<input required type="password" name="password" id="password" value="" />
					</label>
					<small class="error">Contraseña es campo requerido</small>
				</div>
				<!-- ./ password -->

				<!-- Password Confirm -->
				<div class="password-confirm-field">
					<label>Password Confirm
						<input required data-equalto="password" type="password" name="password_confirmation" id="password_confirmation" value="" />
						</label>
						<small class="error">Las contraseñas deben ser iguales</small>
				</div>
				<!-- ./ password confirm -->

				<!-- Activation Status -->
				<div class="activate-field">
					<label >Activate User?
						@if ($mode == 'create')
							<select class="form-control" name="confirm" id="confirm">
								<option value="1"{{{ (Input::old('confirm', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
								<option value="0"{{{ (Input::old('confirm', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
							</select>
						@else
							<select class="form-control" {{{ ($user->id === Confide::user()->id ? ' disabled="disabled"' : '') }}} name="confirm" id="confirm">
								<option value="1"{{{ ($user->confirmed ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
								<option value="0"{{{ ( ! $user->confirmed ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
							</select>
						@endif
					</label>
				</div>
				<!-- ./ activation status -->

				<!-- Groups -->
				<div class="roles-field">
	                <label for="roles">Roles</label>
		                <select name="roles[]" id="roles">
		                        @foreach ($roles as $role)
									@if ($mode == 'create')
		                        		<option value="{{{ $role->id }}}"{{{ ( in_array($role->id, $selectedRoles) ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
		                        	@else
										<option value="{{{ $role->id }}}"{{{ ( array_search($role->id, $user->currentRoleIds()) !== false && array_search($role->id, $user->currentRoleIds()) >= 0 ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
									@endif
		                        @endforeach
						</select>
				</div>
						<blockquote>
							Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.
						</blockquote>
				
				<!-- ./ groups -->
			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
			<element class="button secondary close_popup">Cancel</element>
			<button type="reset" class="alert">Reset</button>
			<button type="submit" class="button success">OK</button>
		<!-- ./ form actions -->
	</form>
@stop
@section('scripts')
<script src="{{asset('assets/js/zurb5-multiselect.js')}}"></script>
<script type="text/javascript">
$("select#roles").zmultiselect({  
    live: false,
    placeholder: "Roles",
    filter: false
});
</script>
@stop