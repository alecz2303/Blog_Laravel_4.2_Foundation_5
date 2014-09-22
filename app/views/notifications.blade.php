@if (count($errors->all()) > 0)
<div data-alert class="alert-box alert">
	<a href="#" class="close">&times;</a>
	<h4>Error</h4>
	Please check the form below for errors
</div>
@endif

@if ($message = Session::get('success'))
<div data-alert class="alert-box success">
	<a href="#" class="close">&times;</a>
	<h4>Success</h4>
    @if(is_array($message))
        @foreach ($message as $m)
            {{ $m }}
        @endforeach
    @else
        {{ $message }}
    @endif
</div>
@endif

@if ($message = Session::get('error'))
<div data-alert class="alert-box alert">
	<a href="#" class="close">&times;</a>
	<h4>Error</h4>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = Session::get('warning'))
<div data-alert class="alert-box warning">
	<a href="#" class="close">&times;</a>
	<h4>Warning</h4>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = Session::get('info'))
<div data-alert class="alert-box">
	<a href="#" class="close">&times;</a>
	<h4>Info</h4>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif
