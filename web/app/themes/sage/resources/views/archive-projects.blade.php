@extends('layouts.app')

@section('header')
@endsection

@section('content')
  <main class="container px-4 py-32 mx-auto">
    @include('partials.header-archive')

    @if (! have_posts())
      {!! get_search_form(false) !!}
    @endif

    <div class="flex flex-row">
      @while(have_posts()) @php(the_post())
        <div class="flex flex-col flex-1">
          <div class="bg-blue-300">
            <a href="{!! get_the_permalink() !!}">
              {!! get_the_title() !!}
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
