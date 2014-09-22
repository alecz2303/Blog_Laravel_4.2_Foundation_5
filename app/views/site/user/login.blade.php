@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>{{ Lang::get('user/user.login') }}</h1>
</div>
<form method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
        <div class="row collapse">
            <div class="small-3 large-2 columns">
                <span class="prefix">{{ Lang::get('confide::confide.username_e_mail') }}</span>
            </div>
            <div class="small-9 large-10 columns">
                <input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">
            </div>
        </div>

        <div class="row collapse">
            <div class="small-3 large-2 columns">
                <span class="prefix">{{ Lang::get('confide::confide.password') }}</span>
            </div>
            <div class="small-9 large-10 columns">
                <input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">
            </div>
        </div>

        <div class="row collapse">
            <input type="hidden" name="remember" value="0">
            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"><label>{{ Lang::get('confide::confide.login.remember') }}</label>
        </div>

        @if ( Session::get('error') )
        <div data-alert class="alert-box alert">{{ Session::get('error') }}</div>
        @endif

        @if ( Session::get('notice') )
        <div data-alert class="alert-box">{{ Session::get('notice') }}</div>
        @endif

        <div class="row collapse">
            <button tabindex="3" type="submit">{{ Lang::get('confide::confide.login.submit') }}</button>
            <a class="button alert" href="forgot">{{ Lang::get('confide::confide.login.forgot_password') }}</a>
        </div>
    </fieldset>
</form>

@stop
