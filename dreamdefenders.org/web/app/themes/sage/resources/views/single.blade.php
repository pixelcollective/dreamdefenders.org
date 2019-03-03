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
        <div class="page bg-white">
          @include('partials.content-page')
        </div>
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
      <div class="page bg-white">
        @include('partials.content-page')
      </div>
      @shortcode('[instagram-feed]')
    @endif

  @endposts
@endsection
