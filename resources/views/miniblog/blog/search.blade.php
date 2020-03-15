@extends('miniblog.layouts.app', ['title' => 'Search result for ' . $title]) 
@section('content')
@include('miniblog.layouts.partials._header')
<div class="site-section">
	<div class="container">
	  <div class="row mb-5">
		<div class="col-12">
		  <h2>Recent Posts</h2>
		</div>
	  </div>
	  @if(!empty($posts))
	  <div class="row">
		@foreach($posts as $post)
			<div class="col-lg-4 mb-4">
				<div class="entry2">
					<a href="{{ route('ln.blog.post', $post->slug) }}"><img src="{{ asset('storage/images') . '/' . $post->image }}" alt="Image" class="img-fluid rounded"></a>
					<div class="excerpt">
					@foreach($post->tags as $tag)
					<a href="{{ route('ln.blog.search') }}?tag={{ $tag->name }}"><span class="post-category text-white bg-secondary mb-3">#{{ $tag->name }}</span></a>
					@endforeach
					<h2><a href="{{ route('ln.blog.post', $post->slug) }}">{{ $post->title }}</a></h2>
					<div class="post-meta align-items-center text-left clearfix">
					<figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('storage/avatar/460/' . $post->user->avatar) }}" alt="{{ $post->user->name }}" class="img-fluid"></figure>
					<span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
					<span>&nbsp;-&nbsp; {{ $post->published }}</span>
					</div>
					
					<p>{{ \Str::words($post->content, 20) }}</p>
					<p><a href="{{ route('ln.blog.post', $post->slug) }}">Read More</a></p>
					</div>
				</div>
			</div>
		@endforeach
	  </div>
	  @else
	  <div class="alert alert-danger">{!! $error ?? 'Posts Not Found' !!}</div>
	  @endif

	  <!-- Need improvement, css so bad. haha -->
	  @if($posts)
	  <div class="row text-center pt-5 border-top">
		<div class="col-md-12">
			{{ $posts->links() }}
		</div>
	  </div>
	  @endif
	</div>
</div>
@include('miniblog.layouts.partials._footer')
@endsection