@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @posts

    {{-- Builder Layout --}}
    @if(get_field('components'))
      @layouts('components')

        @layout('header')
          @include('components.hero')
        @endlayout

        @layout('content')
        <main>
          <article class="page bg-white">
            @include('partials.content-page')
          </article>
        </main>
        @endlayout

        @layout('instagram')
          @shortcode('[instagram-feed]')
        @endlayout

        @layout('form')
          @include('components.form')
        @endlayout

        @layout('cta-email')
          @include('partials.cta-email')
        @endlayout

      @endlayouts

    {{-- Fallback Layout --}}
    @else
      <main>
        <article class="page bg-white">
          @include('partials.content-page')
        </article>
      </main>
      @shortcode('[instagram-feed]')
    @endif

  @endposts
@endsection
