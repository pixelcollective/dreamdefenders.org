@extends('layouts.app')

@section('header')
@endsection

@section('content')
  <main class="container px-4 py-32 mx-auto">
    @include('partials.header-archive')

    @if (! have_posts())
      {!! get_search_form(false) !!}
    @endif

    <div class="flex flex-col md:flex-row flex-wrap">
      @while(have_posts()) @php(the_post())
        <div class="p-2 w-full md:w-1/4">
          <div class="p-1 bg-blue-100 h-64 w-full">
            <a href="{!! get_the_permalink() !!}" class="h-full w-full">
              <h3 class="font-display text-bold h-64">
                {!! get_the_title() !!}
              </h3>
            </a>
          </div>
        </div>
      @endwhile
    </div>

    <div class="flex flex-col">
      {!! get_the_posts_navigation() !!}
    </div>
  </main>
@endsection
