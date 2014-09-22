@extends('site.layouts.default')

{{-- Content --}}
@section('content')



@foreach ($posts as $post)

<ul class="pricing-table"> 
	<li class="title">
		<h4>
			<strong>
				<a href="{{{ $post->url() }}}">{{ String::title($post->title) }}</a>
			</strong>
		</h4>
	</li> 
	<li class="price">
		<a href="{{{ $post->url() }}}" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
	</li> 
	<li class="bullet-item"><p>{{ String::tidy(Str::limit($post->content, 200)) }}</p></li> 
	<li class="bullet-item">
		<p>
			<span class="fa fa-user"></span> by <span class="muted">{{{ $post->author->username }}}</span>
			| <span class="fa fa-calendar"></span> <!--Sept 16th, 2012-->{{{ $post->date() }}}
			| <span class="fa fa-comment"></span> <a href="{{{ $post->url() }}}#comments">{{$post->comments()->count()}} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>
		</p>
	</li> 
	<li class="cta-button"><a class="button" href="{{{ $post->url() }}}">Read more</a></li> 
</ul>

<hr />
@endforeach

{{ $posts->links() }}

@stop
