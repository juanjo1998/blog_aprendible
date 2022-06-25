@extends('layout')

@section('content')
	
<section class="posts container">
	@foreach ($posts as $post)
		<article class="post w-gallery">
			@if ($post->images->count() === 1)
				<figure>
					<img src="{{Storage::url($post->images->first()->url)}}" class="img-responsive">
				</figure>

			@elseif($post->images->count() >= 4)
				<div class="gallery-photos masonry">				
					@foreach ($post->images->take(4) as $image)						
						<figure class="gallery-image">
							@if ($loop->iteration === 4)
								<div class="overlay">{{$post->images->count()}} Imágenes</div>
							@endif
							<img src="{{Storage::url($image->url)}}" class="img-post-gallery">
						</figure>			
					@endforeach
				</div>

			@elseif($post->iframe)
			<div class="video">
				{!!$post->iframe!!}
			</div>
			@endif
			<div class="content-post">				
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gris">{{$post->published_at->format('M d Y')}}</span>
					</div>
					<div class="post-category">
						
						<span class="category text-capitalize">
							<a href="{{route('categories.show',$post->category)}}">{{$post->category->name}}</a>
						</span>
						
					</div>
				</header>
				<h1>{{$post->title}}</h1>
				<div class="divider"></div>
				<p>{{$post->excerpt}}</p>
				<footer class="container-flex space-between">
					<div class="read-more">
						<a href="{{route('posts.show',$post)}}" class="text-uppercase c-green">read more</a>
					</div>
					<div class="tags container-flex">
						@foreach ($post->tags as $tag)
							<span class="tag c-gray-1 text-capitalize">
								<a href="{{route('tags.show',$tag)}}"># {{$tag->name}}</a>
							</span>
						@endforeach
					</div>
				</footer>
			</div>
		</article>
	@endforeach
</section><!-- fin del div.posts.container -->

{{-- <div class="pagination">
	<ul class="list-unstyled container-flex space-center">
		<li><a href="#" class="pagination-active">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
	</ul>
</div>	 --}}

{{$posts->links()}}
@endsection