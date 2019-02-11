@extends('layouts.app')

@section('content')
  <div id="primary" class="content-area">
    <div id="content" class="site-content">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-single-'.get_post_type())
    @endwhile
    </div>
  </div>
@endsection
