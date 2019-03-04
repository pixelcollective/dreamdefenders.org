@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('components.hero-archive-project')
  @if (!have_posts())
  <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="post-index">
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-project')
    @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
  @shortcode('[instagram-feed]')
@endsection()
