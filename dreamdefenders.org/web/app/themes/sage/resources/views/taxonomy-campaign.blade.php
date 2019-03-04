@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('components.hero-taxonomy-campaign')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="post-index">
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-freedom-paper')
    @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
  @shortcode('[instagram-feed]')
@endsection()
