@extends('layouts.app')

@section('content')
  @includeFirst([
    "partials.header-archive-{$posttype}",
    "partials.header-archive"
  ])

  <main class="container px-4 pb-32 mx-auto">
    @if (! have_posts())
      {!! get_search_form(false) !!}
    @endif

    @includeFirst([
      "partials.archive-{$posttype}",
      "partials.archive"
    ])

    <div class="flex flex-col">
      @include('components.pagination')
    </div>
  </main>
@endsection
