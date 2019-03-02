@extends('layouts.app')

@section('content')
  @posts

    {{-- Builder Layout --}}
    @if(get_field('components'))
      @layouts('components')

        @layout('header')
          @include('components.hero')
        @endlayout

        @layout('content')
          @include('partials.content-page')
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
      @include('components.hero-default')
      @include('partials.content-page')
      @shortcode('[instagram-feed]')
    @endif

  @endposts
@endsection
