@extends('layouts.app')

@section('header')
  @include("partials.header-search")
@endsection

@section('content')
  <main class='container px-4 pb-32 mx-auto'>
    @if (! have_posts())
      <h2>{{ __('Sorry, no results were found.', 'sage') }}</h2>
      {!! get_search_form(false) !!}
    @endif

    @while(have_posts()) @php(the_post())
      @include('partials.content-search')
    @endwhile

    {!! get_the_posts_navigation() !!}
  </main>
@endsection
