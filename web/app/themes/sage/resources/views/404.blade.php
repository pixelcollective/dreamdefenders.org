@extends('layouts.app')

@section('content')
  <div class="py-64">
    @if (! have_posts())
      <h1 class="pb-16 text-5xl text-center text-black font-display">
        404
      </h1>

      <div class="container mx-auto text-center">
        {!! get_search_form(false) !!}
      </div>
    @endif
  </div>
@endsection
