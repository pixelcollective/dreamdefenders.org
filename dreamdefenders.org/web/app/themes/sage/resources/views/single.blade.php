@extends('layouts.app')

@section('content')
  <div id="primary" class="content-area">
    <div id="content" class="site-content">
      @posts
        @include('partials.content-single-'.get_post_type())
      @endposts
    </div>
  </div>
@endsection
