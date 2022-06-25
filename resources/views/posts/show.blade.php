@extends('layout')

@section('meta-title',$post->title)
@section('meta-description',$post->excerpt)

@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
@endpush

@section('content')
  <article class="post container" style="padding-left: 0;padding-right:0">
    @if ($post->images->count() === 1)
        <figure>
          <img src="{{Storage::url($post->images->first()->url)}}" class="img-responsive">
        </figure>
    @elseif($post->images->count() > 1)
        @include('posts.includes.carousel')
    @endif

    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{$post->published_at->format('M D Y')}}</span>
        </div>
        <div class="post-category">
          <span class="category text-capitalize">
            <a href="{{route('categories.show',$post->category)}}">{{$post->category->name}}</a>
          </span>
        </div>
      </header>
      <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">                       
          <div>
            <p>
                {!!$post->body!!}
            </p>
          </div>
        </div>

        <footer class="container-flex space-between">
          {!!$socialShare!!}
          <div class="tags container-flex">
              @foreach ($post->tags as $tag)                          
                 <span class="tag c-gris"># {{$tag->name}}</span>
              @endforeach
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>

        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                
      </div><!-- .comments -->
    </div>
  </article>
@endsection

@push('scripts')

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
            
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://zendero.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
@endpush