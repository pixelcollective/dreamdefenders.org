@extends('layouts.app')

@section('content')
  @include("partials.header-search")

  <div class="container mx-auto px-4">
    @if (! have_posts())
      @alert(['type' => 'warning'])
        {{ __('Sorry, no results were found.', 'sage') }}
      @endalert

      {!! get_search_form(false) !!}
    @endif

    @while(have_posts()) @php(the_post())
      @include('partials.content-search')
    @endwhile

    {!! get_the_posts_navigation() !!}
  @endsection
</div>
