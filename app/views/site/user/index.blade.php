@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.settings') }}} ::
@parent
@stop

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
body {
	background: #f2f2f2;
}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>{{ Lang::get('user/user.edit_settings') }}</h3>
</div>
<form data-abide method="post" action="{{ URL::to('user/' . $user->id . '/edit') }}"  autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
        <!-- username -->
        <div class="row collapse">
            <div class="small-3 large-2 columns">
                <span class="prefix">Username</span>
            </div>
            <div class="small-9 large-10 columns">
                <input type="text" name="username" id="username" value="{{{ Input::old('username', $user->username) }}}" />
            </div>
        </div>
        <!-- ./ username -->

        <!-- Email -->
        <div class="row collapse">
            <div class="small-3 large-2 columns">
                <span class="prefix">Email</span>
            </div>
            <div class="small-9 large-10 columns">
                <input type="email" name="email" id="email" value="{{{ Input::old('email', $user->email) }}}" />
                <small class="error">A valid email address is required.</small>
            </div>
        </div>
        <!-- ./ email -->

        <!-- Password -->
        <div class="row collapse">
            <div class="small-3 large-2 columns">
                <span class="prefix">Password</span>
            </div>
            <div class="small-9 large-10 columns">
                <input type="password" name="password" id="password" value="" />
            </div>
        </div>
        <!-- ./ password -->

        <!-- Password Confirm -->
        <div class="row collapse">
            <div class="small-3 large-2 columns">
                <span class="prefix">Password Confirm</span>
            </div>
            <div class="small-9 large-10 columns">
                <input type="password" data-equalto="password" name="password_confirmation" id="password_confirmation" value="" />
                <small class="error">{{ Lang::get('admin/users/messages.password_does_not_match') }}</small>
            </div>
        </div>
        <!-- ./ password confirm -->

    <!-- Form Actions -->
    <div class="row collapse">
        <div class="col-md-offset-2 col-md-10">
            <button class="expand" type="submit">Update</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
</form>
@stop
