@extends('layouts.app')

@section('content')
  @include('partials.header-archive')

  @if (! have_posts())
    {!! get_search_form(false) !!}
  @endif

  <div class="pb-32">
    @include('partials.archive')
  </div>

  <div class="flex flex-col">
    {!! get_the_posts_navigation() !!}
  </div>
@endsection
