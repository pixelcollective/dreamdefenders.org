@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @posts
    {{-- Builder Layout --}}
    @layouts('components')

      @layout('paper')
        <main>
          <div class="page bg-white">
            @include('components.freedom-paper')
          </div>
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
  @endposts
@endsection
