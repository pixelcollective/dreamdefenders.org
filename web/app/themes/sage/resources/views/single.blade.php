@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(["partials.content-single-{$postType}", "partials.content-single"])
  @endwhile

  @include('components.instagram')
@endsection
