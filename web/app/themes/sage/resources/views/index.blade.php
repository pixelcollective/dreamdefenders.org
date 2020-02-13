@extends('layouts.app')

@section('content')
  <main class="container px-4 py-16 mx-auto">
    @include('partials.header-page')

    @if (! have_posts())
      {!! get_search_form(false) !!}
    @endif

    <div class="flex flex-row">
      @while(have_posts()) @php(the_post())
        <div class="flex flex-col w-4/5 flex-2">
          @include('partials.content')
        </div>

        <div class="flex flex-col flex-1 w-1/5">
          @include('partials.sidebar')
        </div>
      @endwhile
    </div>

    <div class="flex flex-col">
      {!! get_the_posts_navigation() !!}
    </div>
  </main>
@endsection
