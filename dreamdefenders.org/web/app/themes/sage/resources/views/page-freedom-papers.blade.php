@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('components.hero-default')

  @posts
    <main>
      <article class="page bg-white">
        @include('partials.content-page')
      </article>
    </main>
  @endposts


  <div class="post-index">
    @foreach($papers as $paper)
      @include('partials.content-freedom-paper', ['paper' => $paper])
    @endforeach
  </div>

  @layouts('components')
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
@endsection
