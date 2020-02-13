@extends('layouts.app')

@section('content')
  <main class="container px-4 py-32 mx-auto">
    @include('partials.header-archive')

    @if (! have_posts())
      {!! get_search_form(false) !!}
    @endif

    @include("partials.archive-{$posttype}")

    <div class="flex flex-col">
      {!! get_the_posts_navigation() !!}
    </div>
  </main>
@endsection
