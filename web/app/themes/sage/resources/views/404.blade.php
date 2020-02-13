@extends('layouts.app')

@section('content')
  <div class="py-64">
    @if (! have_posts())
      <h1 class="text-5xl font-display text-center text-black pb-16">
        404
      </h1>

      <div class="container mx-auto text-center">
        {!! get_search_form(false) !!}
      </div>
    @endif
  </div>
@endsection
