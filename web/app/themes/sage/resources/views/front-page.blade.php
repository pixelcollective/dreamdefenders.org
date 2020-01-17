@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('partials.front.two-paths')

  @include('partials.front.organize')

  @while(have_posts()) @php(the_post())
    <div class="container py-24 mx-auto">
      @include('partials.content-page')
    </div>

    <section class="px-4 bg-black-100">
      <div class="container py-16 mx-auto">
        @include('forms.dream-together')
      </div>
    </section>
  @endwhile

  @include('components.instagram')
@endsection
