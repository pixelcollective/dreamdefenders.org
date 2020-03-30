@extends('layouts.app')

@section('content')
  @include('partials.header-archive')

  @if (! have_posts())
    {!! get_search_form(false) !!}
  @endif

  <main class="container px-4 pb-32 mx-auto">
    @include('partials.archive')
  </main>

  <div class="flex flex-col">
    {!! get_the_posts_navigation() !!}
  </div>
@endsection
