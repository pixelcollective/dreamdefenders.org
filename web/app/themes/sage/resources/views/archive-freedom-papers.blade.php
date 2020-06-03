@extends("layouts.app")

@section("content")
  @include("partials.header-archive")

  <main class="container px-4 pb-32 mx-auto">
    @if (! have_posts())
      {!! get_search_form(false) !!}
    @endif

    @include("partials.archive-freedom-papers")
  </main>
@endsection
