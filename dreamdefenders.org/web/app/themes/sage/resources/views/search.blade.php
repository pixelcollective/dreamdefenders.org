@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @if(!have_posts())
    <div class="alert alert-warning">{{ __('Sorry, no results were found.', 'sage') }}</div>
    {!! get_search_form(false) !!}
  @endif
  @posts
    @include('partials.content-search')
  @endposts
  {!! get_the_posts_navigation() !!}
@endsection
